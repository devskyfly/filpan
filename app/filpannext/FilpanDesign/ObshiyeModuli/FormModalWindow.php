<?php
?>
<div class="feedback-modal" id="feedbackModal" aria-hidden="true">
    <div class="feedback-modal__overlay"></div>

    <div
        class="feedback-modal__window"
        role="dialog"
        aria-modal="true"
        aria-labelledby="feedbackModalTitle"
    >
        <button
            type="button"
            class="feedback-modal__close js-close-feedback"
            aria-label="Закрыть форму"
        >
            &times;
        </button>

        <h2 class="feedback-modal__title" id="feedbackModalTitle">
            Оставить заявку
        </h2>

        <form class="feedback-form" id="feedbackForm" method="post">
            <input
                type="hidden"
                id="feedbackFormType"
                name="form_type"
                value="message"
            >

            <div class="feedback-form__field">
                <label for="feedbackName">Имя</label>
                <input
                    type="text"
                    id="feedbackName"
                    name="name"
                    maxlength="100"
                    autocomplete="name"
                    required
                >
            </div>

            <div class="feedback-form__field">
                <label for="feedbackPhone">Телефон</label>
                <input
                    type="tel"
                    id="feedbackPhone"
                    name="phone"
                    maxlength="30"
                    autocomplete="tel"
                    required
                >
            </div>

            <div class="feedback-form__field">
                <label for="feedbackEmail">Почта</label>
                <input
                    type="email"
                    id="feedbackEmail"
                    name="email"
                    maxlength="150"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="feedback-form__field">
                <label for="feedbackComment">Комментарий</label>
                <textarea
                    id="feedbackComment"
                    name="comment"
                    rows="5"
                    maxlength="2000"
                    required
                ></textarea>
            </div>

            <!-- Простая защита от автоматического спама -->
            <div class="feedback-form__honeypot" aria-hidden="true">
                <label>
                    Не заполняйте это поле
                    <input
                        type="text"
                        name="website"
                        tabindex="-1"
                        autocomplete="off"
                    >
                </label>
            </div>

            <button type="submit" class="feedback-form__submit">
                Отправить
            </button>

            <div
                class="feedback-form__message"
                id="feedbackMessage"
                role="status"
                aria-live="polite"
            ></div>
        </form>
    </div>
</div>
