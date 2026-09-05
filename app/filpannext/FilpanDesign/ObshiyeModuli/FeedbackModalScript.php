<script>
    $(function () {
        var $modal = $('#feedbackModal');
        var $form = $('#feedbackForm');
        var $message = $('#feedbackMessage');
        var $submitButton = $form.find('[type="submit"]');
        var $formType = $('#feedbackFormType');
        var $modalTitle = $('#feedbackModalTitle');
        var $phone = $('#feedbackPhone');
        var $phoneField = $phone.closest('.feedback-form__field');
        var $email = $('#feedbackEmail');
        var $emailField = $email.closest('.feedback-form__field');
        var $comment = $('#feedbackComment');
        var $commentField = $comment.closest('.feedback-form__field');
        var $lastFocusedElement = $();

        function openFeedbackModal(feedbackType) {
            var isCallback = feedbackType === 'callback';

            $lastFocusedElement = $(document.activeElement);

            $form[0].reset();
            $formType.val(isCallback ? 'callback' : 'message');
            $modalTitle.text(isCallback ? 'Заказать звонок' : 'Напишите нам');

            if (isCallback) {
                $phoneField
                    .show()
                    .attr('aria-hidden', 'false');
                $phone.prop('disabled', false).prop('required', true);
                $emailField
                    .hide()
                    .attr('aria-hidden', 'true');
                $email.val('').prop('disabled', true).prop('required', false);
                $commentField
                    .hide()
                    .attr('aria-hidden', 'true');
                $comment.val('').prop('disabled', true).prop('required', false);
            } else {
                $phoneField
                    .hide()
                    .attr('aria-hidden', 'true');
                $phone.val('').prop('disabled', true).prop('required', false);
                $emailField
                    .show()
                    .attr('aria-hidden', 'false');
                $email.prop('disabled', false).prop('required', true);
                $commentField
                    .show()
                    .attr('aria-hidden', 'false');
                $comment.prop('disabled', false).prop('required', true);
            }

            $message
                .removeClass('is-success is-error')
                .hide()
                .text('');

            $modal
                .addClass('is-open')
                .attr('aria-hidden', 'false');

            $('body').addClass('feedback-modal-open');

            window.setTimeout(function () {
                $('#feedbackName').trigger('focus');
            }, 50);
        }

        function closeFeedbackModal() {
            $modal
                .removeClass('is-open')
                .attr('aria-hidden', 'true');

            $('body').removeClass('feedback-modal-open');

            if ($lastFocusedElement.length) {
                $lastFocusedElement.trigger('focus');
            }
        }

        // Открытие по кнопке.
        // Можно добавить класс js-open-feedback к любой кнопке или ссылке.
        $(document).on('click', '.js-open-feedback', function (event) {
            event.preventDefault();
            openFeedbackModal($(this).attr('data-feedback-type'));
        });

        // Закрытие по крестику
        $(document).on('click', '.js-close-feedback', function () {
            closeFeedbackModal();
        });

        // Закрытие при клике на затемнённый фон
        $modal.on('click', '.feedback-modal__overlay', function () {
            closeFeedbackModal();
        });

        // Закрытие по Escape
        $(document).on('keydown', function (event) {
            if (event.key === 'Escape' && $modal.hasClass('is-open')) {
                closeFeedbackModal();
            }
        });

        $form.on('submit', function (event) {
            event.preventDefault();

            $message
                .removeClass('is-success is-error')
                .hide()
                .text('');

            $submitButton
                .prop('disabled', true)
                .text('Отправка...');

            $.ajax({
                url: '/feedback/executor.php',
                type: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                timeout: 15000
            })
                .done(function (response) {
                    if (response.success) {
                        $message
                            .addClass('is-success')
                            .text(response.message || 'Спасибо! Сообщение отправлено.')
                            .show();

                        $form[0].reset();

                        // При необходимости закрываем окно через 2 секунды
                        window.setTimeout(function () {
                            closeFeedbackModal();

                            $message
                                .removeClass('is-success is-error')
                                .hide()
                                .text('');
                        }, 2000);
                    } else {
                        $message
                            .addClass('is-error')
                            .text(response.message || 'Не удалось отправить сообщение.')
                            .show();
                    }
                })
                .fail(function (xhr) {
                    var errorMessage = 'Произошла ошибка. Попробуйте ещё раз.';

                    if (
                        xhr.responseJSON &&
                        xhr.responseJSON.message
                    ) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    $message
                        .addClass('is-error')
                        .text(errorMessage)
                        .show();
                })
                .always(function () {
                    $submitButton
                        .prop('disabled', false)
                        .text('Отправить');
                });
        });
    });
</script>
