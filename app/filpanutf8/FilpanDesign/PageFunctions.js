//Trebuetsiya zamena domena
WEB_ROOT = '/filpannext/';

function inicializaciyaSobitiy() {
    SkritKorzinu();

    $('#VashaKOrzina').mousedown(function () {
        PokazatKorzinu()
    });

   $('#KorzinaElementTovara').click(function () {
        PokazatKorzinu()
    });

    $('.button_goto_cart').click(function () {
        PokazatKorzinu()
    });


    $('#FonZatemneniyaKorzini').click(function () {
        SkritKorzinu()
    });


    $('.raskritiyePlus').click(function () {
        RazvernutSvernutMenu(this)
    });
    $('.raskritiyeMinus').click(function () {
        RazvernutSvernutMenu(this)
    });

    $('body').on('click', '.KorzinaKupit', function () {
        KupitNeskolkoTovarov(this)
    });

    $("input.StrokaVvodaKolichestvo").blur(function () {
        ProverkaPoliyaVvodaKolichestovo(this)
    });

    $(".TablicaTovarov input").change(function () {
        priIzmeneniyiInputTablici(this)
    });

    ProstavitPlusiIMinusiVMenu();

    if ($(".Aktivnay").length == 1) {
        //var color="#F2F2F2";
        //$(".raskritiyePlus").parent().css("background-color",color);
        //$(".raskritiyePlus").css("background-color",color);
    }

    //
    $('#pokazat_esche').click(function () {
        PokazatEsche()
    });

    $('#pokazat_vse').click(function () {
        PokazatVse()
    });
    //
}

function KupitNeskolkoTovarov(element) {
    id = $(element).next("input[type=hidden]").val();
    kolichestvo = $(element).parent().parent().find("input.StrokaVvodaKolichestvo").val();
 //console.log(kolichestvo);
    $.post(WEB_ROOT + "FilpanDesign/User/Kupit.php",
        {
            id: id,
            kolichestvo: kolichestvo
        },
        function (data, status) {

            $('.next_bye').fadeIn(350);
            $('.zshader').fadeIn(350);
            $('.info_bye').text(data);


            // alert(data);
            $('.zshader').click(function () {
                $('.next_bye').fadeOut(220);
                $('.zshader').fadeOut(220);
            });
            $('.nextx').click(function () {
                $('.next_bye').fadeOut(220);
                $('.zshader').fadeOut(220);
            });

            RefreshCartData();

        });

//alert("В корзину добавлено "+kolichestvo+" товаров");
}

function RefreshCartData() {
    $.post(WEB_ROOT + "FilpanDesign/User/PoluchitObshuyuSummuIKolichestvo.php",
        function (data, status) {
            var cartData = [];
            cartData = data.split('==');
            $("#KolichestvoTovarov").html(cartData[0]);
            $("#ObschayaSumma").html(cartData[1]);

            if (cartData[0] == 0 || cartData[1] == 0) {
                $("#CartData").fadeOut("fast");
            }
            else {
                $("#CartData").fadeIn("fast");
            }
        }
    );
}

function ProverkaPoliyaVvodaKolichestovo(element) {
    parsing = parseInt($(element).val());
    if (isNaN(parsing)) {
        alert("Введите целое число.");
        $(element).val(1);
    }
    else {
        $(element).val(parsing);
    }
}

function SkritKorzinu() {
    $("#FonZatemneniyaKorzini").fadeOut();
    $('.zshader').fadeOut();
    $("#Korzina").fadeOut("slow");
}

function PokazatKorzinu() {
    $('.next_bye').fadeOut(220);
    $("#Korzina").fadeIn("slow");

    $("#FonZatemneniyaKorzini").fadeIn("slow");

    //$("#Korzina").html(WEB_ROOT+"FilpanDesign/ObshiyeModuli/Korzina.php");
    $("#Korzina").load(WEB_ROOT + "FilpanDesign/ObshiyeModuli/Korzina.php", function () {
        $('.plus').click(function () {
            NagatieNaPlus(this)
        });
        $('.minus').click(function () {
            NagatieNaMinus(this)
        });
        //$('.StrokaVvodaKolichestvo').blur(function(){Redaktirovanie(this)});
        $(".UdalitPokupku").click(function () {
            UdalitPokupku(this)
        });
        $('#KnopkaOchistitKorzinu').click(function () {
            OchistitKorzinu();
        });
        $('#ProdolgitOformleniye').click(function () {
            ProdolgitOformleniyeZakaza();
        });
    });
}

function ProdolgitOformleniyeZakaza() {

    $("#Korzina").load(WEB_ROOT + "FilpanDesign/ObshiyeModuli/BlankZakaza.php", function () {
    	$('#TELEFON').mask('+7(999) 999-99-99');
    	
        $('#SAMOVIVOZ').click(function () {
            NagatieNaSamovivoz(this)
        });
        $('.RadioKnopkaPoPokupatelu').click(function () {
            RadioKnopkaPoPokupatelu(this)
        });
        $('.RadioKnopkaPoSposobuOplati').click(function () {
            RadioKnopkaPoSposobuOplati(this)
        });
        $('#VernutsiyaVKorzinu').mousedown(function () {
            PokazatKorzinu()
        });
        $('#OtpravitZakaz').mousedown(function () {
            OtpravitZakaz()
        });
    });
}

function OtpravitZakaz() {

    if ($('#SAMOVIVOZ')[0].checked) {
        VIEZD = 0;
    }
    else {
        VIEZD = 1;
    }

    if ($('.RadioKnopkaPoSposobuOplati:checked').val() == 'nalichniy') {
        NAL = 1;
    }
    else {
        NAL = 0;
    }


    if ($('.RadioKnopkaPoPokupatelu:checked').val() == 'fizicheskoe') {
        FIZ = 1;
    }
    else {
        FIZ = 0;
    }

    if ($('#FAMILIYA').val().length < 3) {
        alert("Заполните поле фамилия.");
        return;
    }
    
    if ($('#IMA').val().length < 3) {
        alert("Заполните поле имя.");
        return;
    }

    if ($('#TELEFON').val().length < 3) {
        alert("Заполните поле телефон.");
        return;
    }

    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test($('#EMAIL').val())) {
        alert("Заполните поле электронная почта.");
        return;
    }
    

    if (!$('#SAMOVIVOZ')[0].checked) {
        if ($('#ADRESDOSTAVKI').val().length < 3) {
            alert("Заполните поле адрес доставки.");
            return;
        }
    }


    StrokaParametrov = 'FAMILIYA=' + encodeURIComponent($('#FAMILIYA').val()) +
    	'&IMA=' + encodeURIComponent($('#IMA').val()) +
        '&ORGANIZACIYA=' + encodeURIComponent($('#ORGANIZACIYA').val()) +
        '&TELEFON=' + encodeURIComponent($('#TELEFON').val()) +
        '&ADRESDOSTAVKI=' + encodeURIComponent($('#ADRESDOSTAVKI').val()) +
        '&METRO=' + encodeURIComponent($('#METRO').val()) +
        '&EMAIL=' + encodeURIComponent($('#EMAIL').val()) +
        '&INNKPP=' + encodeURIComponent($('#INNKPP').val()) +
        '&URADRES=' + encodeURIComponent($('#URADRES').val()) +
        '&FAKADRES=' + encodeURIComponent($('#FAKADRES').val()) +
        '&OKPO=' + encodeURIComponent($('#OKPO').val()) +
        '&RS=' + encodeURIComponent($('#RS').val()) +
        '&BANK=' + encodeURIComponent($('#BANK').val()) +
        '&KS=' + encodeURIComponent($('#KS').val()) +
        '&NAL=' + NAL +
        '&FIZ=' + FIZ +
        '&VIEZD=' + VIEZD;

//$('#Korzina').html('Заказ отправлен.');

    var korzina_body=$("#korzina_body");
    $.ajax
    (
        {
            type: "POST",
            async: false,
            url: WEB_ROOT + "FilpanDesign/ObshiyeModuli/OtpravitZakaz.php",
            data: StrokaParametrov,
            success: function (msg) {
            	$("#Korzina").load(WEB_ROOT + "FilpanDesign/ObshiyeModuli/Final_korzina.php",StrokaParametrov);
            	//$("#Korzina").html(msg);
            }
        }
    )


}

function NagatieNaSamovivoz(element) {
    if (element.checked == true) {
    	
    	$('#ADRESDOSTAVKI').parent().parent().hide();
    	$('#METRO').parent().parent().hide();
    	
        if ($('.RadioKnopkaPoSposobuOplati:checked').val() == 'nalichniy') {
            $('#ZakazViezd').hide();
            $('#ZakazViezdBeznal').hide();
            $('#ZakazSamovivozBeznal').hide();
            $('#ZakazSamovivoz').show();
            
        }
        else {
            $('#ZakazViezd').hide();
            $('#ZakazViezdBeznal').hide();
            $('#ZakazSamovivoz').hide();
            $('#ZakazSamovivozBeznal').show();
        }

    }
    else {
    	
    	$('#ADRESDOSTAVKI').parent().parent().show();
    	$('#METRO').parent().parent().show();
    	
        if ($('.RadioKnopkaPoSposobuOplati:checked').val() == 'nalichniy') {

            $('#ZakazViezd').show();
            $('#ZakazSamovivoz').hide();
            $('#ZakazSamovivozBeznal').hide();
            $('#ZakazViezdBeznal').hide();

        }
        else {
            $('#ZakazViezdBeznal').show();
            $('#ZakazSamovivoz').hide();
            $('#ZakazSamovivozBeznal').hide();
            $('#ZakazViezd').hide();
        }

    }
}

function RadioKnopkaPoPokupatelu(element) {
    if ($(element).val() == 'fizicheskoe') {
        $('.ORGANIZACIYA').hide();
        $('.BEZNAL').hide();

        RadioKnopkaPoSposobuOplati($('.RadioKnopkaPoSposobuOplati:checked'));
    }
    else {
        $('.ORGANIZACIYA').show();
        $('.BEZNAL').show();
        RadioKnopkaPoSposobuOplati($('.RadioKnopkaPoSposobuOplati:checked'));

    }
}

function RadioKnopkaPoSposobuOplati(element) {
    /*if($(element).val()=='nalichniy')
     {
     $('.BEZNAL').hide();
     }
     else
     {
     $('.BEZNAL').show();
     }*/


    if ($('#SAMOVIVOZ')[0].checked == true) {
        if ($('.RadioKnopkaPoSposobuOplati:checked').val() == 'nalichniy') {
            $('#ZakazViezd').hide();
            $('#ZakazViezdBeznal').hide();
            $('#ZakazSamovivozBeznal').hide();
            $('#ZakazSamovivoz').show();
            //$('.BEZNAL').hide();
        }
        else {
            $('#ZakazViezd').hide();
            $('#ZakazViezdBeznal').hide();
            $('#ZakazSamovivoz').hide();
            $('#ZakazSamovivozBeznal').show();
            $('.BEZNAL').show();
        }

    }
    else {
        if ($('.RadioKnopkaPoSposobuOplati:checked').val() == 'nalichniy') {
            //$('.BEZNAL').hide();
            $('#ZakazViezd').show();
            $('#ZakazSamovivoz').hide();
            $('#ZakazSamovivozBeznal').hide();
            $('#ZakazViezdBeznal').hide();

        }
        else {
            $('#ZakazViezdBeznal').show();
            $('#ZakazSamovivoz').hide();
            $('#ZakazSamovivozBeznal').hide();
            $('#ZakazViezd').hide();
            $('.BEZNAL').show();
        }

    }
}

function OchistitKorzinu() {
    $.post(WEB_ROOT + "FilpanDesign/User/OchistitKorzinu.php",
        function (data, status) {
            RefreshCartData();
            PokazatKorzinu();
        });
}

function NagatieNaPlus(element) {
    $(element).prev('.StrokaVvodaKolichestvo').val(parseInt($(element).prev('.StrokaVvodaKolichestvo').val()) + 1);
    kolichestvo = $(element).parent().parent().find(".StrokaVvodaKolichestvo").val();
    cena = $(element).parent().parent().find(".cena").html();
    $(element).parent().parent().find(".summa").html(cena * kolichestvo);
    id = $(element).parent().parent().find(".id").val();

    $.post(WEB_ROOT + "FilpanDesign/User/IzmenitKolichestvoPokupok.php",
        {
            id: id,
            kolichestvo: kolichestvo
        },
        function (data, status) {
            $.post(WEB_ROOT + "FilpanDesign/User/PoluchitObshuyuSummuIKolichestvo.php",
                function (data, status) {
                    var cartData = [];
                    cartData = data.split('==');
                    $('.CenaSumma').html(cartData[1]);

                    $("#KolichestvoTovarov").html(cartData[0]);
                    $("#ObschayaSumma").html(cartData[1]);
                }
            );
        });
}

function Redaktirovanie(element) {

    if ((parseInt($(element).next('.StrokaVvodaKolichestvo').val())) <= 0) {
        var Udalit = confirm("Вы уверены, что хотите удалить эту позицию?");
        if (Udalit == true) {

            id = $(element).parent().parent().find(".id").val();
            $.post(WEB_ROOT + "FilpanDesign/User/UdalitPokupku.php",
                {
                    id: id
                },
                function (data, status) {
                    //alert(data);
                });
            $(element).parent().parent().remove();


            $.post(WEB_ROOT + "FilpanDesign/User/PoluchitObshuyuSummu.php",
                {
                    id: id
                },
                function (data, status) {
                    $('.CenaSumma').html(data);
                });


        }
    }
    else {

        $(element).next('.StrokaVvodaKolichestvo').val(parseInt($(element).next('.StrokaVvodaKolichestvo').val()) - 1);
        kolichestvo = $(element).parent().parent().find(".StrokaVvodaKolichestvo").val();
        cena = $(element).parent().parent().find(".cena").html();
        $(element).parent().parent().find(".summa").html(cena * kolichestvo);
        id = $(element).parent().parent().find(".id").val();


        $.post(WEB_ROOT + "FilpanDesign/User/IzmenitKolichestvoPokupok.php",
            {
                id: id,
                kolichestvo: kolichestvo
            },
            function (data, status) {
                //alert(data);
            });

        $.post(WEB_ROOT + "FilpanDesign/User/PoluchitObshuyuSummu.php",
            {
                id: id
            },
            function (data, status) {
                $('.CenaSumma').html(data);
            });
    }
}

function NagatieNaMinus(element) {

    if ((parseInt($(element).next('.StrokaVvodaKolichestvo').val()) - 1) == 0) {
        var Udalit = confirm("Вы уверены, что хотите удалить эту позицию?");
        if (Udalit == true) {

            id = $(element).parent().parent().find(".id").val();
            $.post(WEB_ROOT + "FilpanDesign/User/UdalitPokupku.php",
                {
                    id: id
                },
                function (data, status) {
                    $.post(WEB_ROOT + "FilpanDesign/User/PoluchitObshuyuSummuIKolichestvo.php",
                        function (data, status) {
                            cartData = data.split('==');

                            $("#KolichestvoTovarov").html(cartData[0]);
                            $("#ObschayaSumma").html(cartData[1]);

                            if (cartData[1] == 0) {
                                $('.CenaSumma').html(cartData[1]);
                                SkritKorzinu();
                                $("#CartData").fadeOut("fast");
                            }
                            else {
                                $('.CenaSumma').html(cartData[1]);
                            }
                        });
                });
            $(element).parent().parent().remove();
        }
    }
    else {
        $(element).next('.StrokaVvodaKolichestvo').val(parseInt($(element).next('.StrokaVvodaKolichestvo').val()) - 1);
        kolichestvo = $(element).parent().parent().find(".StrokaVvodaKolichestvo").val();
        cena = $(element).parent().parent().find(".cena").html();
        $(element).parent().parent().find(".summa").html(cena * kolichestvo);
        id = $(element).parent().parent().find(".id").val();

        $.post(WEB_ROOT + "FilpanDesign/User/IzmenitKolichestvoPokupok.php",
            {
                id: id,
                kolichestvo: kolichestvo
            },
            function (data, status) {
                $.post(WEB_ROOT + "FilpanDesign/User/PoluchitObshuyuSummuIKolichestvo.php",
                    function (data, status) {

                        cartData = data.split('==');

                        $("#KolichestvoTovarov").html(cartData[0]);
                        $("#ObschayaSumma").html(cartData[1]);

                        $('.CenaSumma').html(cartData[1]);
                    });
            });
    }
}

function UdalitPokupku(element) {
    id = $(element).parent().parent().find(".id").val();
    $.post(WEB_ROOT + "FilpanDesign/User/UdalitPokupku.php",
        {
            id: id
        },
        function (data, status) {
            $.post(WEB_ROOT + "FilpanDesign/User/PoluchitObshuyuSummuIKolichestvo.php",
                function (data, status) {

                    cartData = data.split('==');

                    $("#KolichestvoTovarov").html(cartData[0]);
                    $("#ObschayaSumma").html(cartData[1]);

                    if (cartData[1] == 0) {
                        $('.CenaSumma').html(cartData[1]);
                        SkritKorzinu();
                        $("#CartData").fadeOut("fast");
                    }
                    else {
                        $('.CenaSumma').html(cartData[1]);
                    }
                });
        });
    $(element).parent().parent().remove();
}

function RazvernutSvernutMenu(element) {

    // if($(element).hasClass('raskritiyePlus'))
    // 	{
    // 		// alert('+ Na -');
    // 		$(element).html('-');
    // 		$(element).removeClass('raskritiyePlus');
    // 		$(element).addClass('raskritiyeMinus');
    // 	}

    // 	if($(element).hasClass('raskritiyeMinus'))
    // 	{
    // 		// alert('- Na +');
    // 		$(element).html('+');
    // 		$(element).removeClass('raskritiyeMinus');
    // 		$(element).addClass('raskritiyePlus');
    // 	}

    // if($(element).html()=='-')
    // {
    // 	alert("-");
    // 	$(element).html('+');
    // 	//$(element).removeClass('raskritiyeMinus');
    // 	//$(element).addClass('raskritiyePlus');

    // }
    // if($(element).html()=='+')
    // {
    // 	$(element).html('-');
    // 	$(element).removeClass('raskritiyePlus');
    // 	$(element).addClass('raskritiyeMinus');
    // }


    $(element).parent().next('ul').toggle('slow', function () {

            if ($(element).hasClass('raskritiyeMinus')) {
                $(element).html('+');
                $(element).removeClass('raskritiyeMinus');
                $(element).addClass('raskritiyePlus');

            }
            else if ($(element).hasClass('raskritiyePlus')) {
                $(element).html('-');
                $(element).removeClass('raskritiyePlus');
                $(element).addClass('raskritiyeMinus');
            }
        }
    );
}

function ProstavitPlusiIMinusiVMenu() {
    //Выделение активной ссылки
    $('li[value=' + $('#AktivniyElementMenu').val() + '] a').removeClass('Neaktivnaya').addClass('Aktivnay');

    //Определили элементы кнопки для раскрытия - свертывания
    raskritiyePlus = $('.raskritiyePlus');
    raskritiyeMinus = $('.raskritiyeMinus');
    //Свертываем все подгруппы меню
    $('.ContentLevayaKolonkaSredniyDiv  ul').hide();
    //Раскрываем тоько перный уровень вложенности
    $('.ContentLevayaKolonkaSredniyDiv > ul').show();

    $('.raskritiyePlus').hide();
    $('.raskritiyeMinus').hide();

    //$(".Aktivnay").parent().next('ul').prev('li').prepend($('.raskritiyeMinus'));
    //$('.ContentLevayaKolonkaSredniyDiv ul').prev('li').prepend($('.raskritiye'));
    $(".Aktivnay").parents('ul').show();
    //Для всех скрытых подменю ставим +

    $('ul:visible').prev('li').prepend($(raskritiyeMinus));
    $('ul:hidden').prev('li').prepend($(raskritiyePlus));

    //$(".Aktivnay").parents('ul').prev('li').find('span').remove();
    //$(".Aktivnay").parents('ul').prev('li').find('span.raskritiyePlus]').remove();
    //$(".Aktivnay").parents('ul').prev('li').prepend(raskritiyeMinus);
    //$(".Aktivnay").parents('ul').prev('li').prepend($(raskritiyeMinus));


    $(".Aktivnay").parent().next('ul').show();

    if ($(".Aktivnay").parent().next('ul').length > 0) {
        //$(".Aktivnay").parent().find('span').remove();
        //$(".Aktivnay").parent().prepend(raskritiyeMinus);
        //$(".Aktivnay").parent().find('span.raskritiyePlus]').remove();
    }

    $('.ContentLevayaKolonkaSredniyDiv .raskritiyePlus').show();
    $('.ContentLevayaKolonkaSredniyDiv .raskritiyeMinus').show();

    $(".Aktivnay").parent().find("span").removeClass('raskritiyePlus').addClass('raskritiyeMinus');
    $("li .raskritiyeMinus").parent().next("ul").addClass('RaskritiySpisok');
}

function PokazatEsche() {

    var next_page = $(".TekushiyElementSsilkaStraniciTablici").parent().next().attr("href");

    if (typeof next_page == "undefined") {
        $("#pokazat_esche").addClass("not_active");
        $("#pokazat_esche").html("Все товары показаны!");
    }
    else {
        $.get(next_page, function (data) {
                var tablica_tovarov = $(data).find(".TablicaTovarov");
                var tablica_tovarov_tovary = $(tablica_tovarov).find(".row_hower_table");

                var last_item_now = $(".TablicaTovarov tr:last-child");
                tablica_tovarov_tovary.insertAfter(last_item_now);

                var page_now = $(".TekushiyElementSsilkaStraniciTablici");
                var page_next = page_now.parent().next().children();

                page_now.removeClass("TekushiyElementSsilkaStraniciTablici");
                page_now.addClass("ElementSsilkaStraniciTablici");

                page_next.removeClass("ElementSsilkaStraniciTablici");
                page_next.addClass("TekushiyElementSsilkaStraniciTablici");

                var next_page_now = $(".TekushiyElementSsilkaStraniciTablici").parent().next().attr("href");

                if (typeof next_page_now == "undefined") {
                    $("#pokazat_esche").addClass("not_active");
                    $("#pokazat_esche").html("Все товары показаны!");
                }

                //CHANGE URL
                try {
                    history.replaceState(null, null, next_page);
                    return;
                }
                catch (e) {
                }
            }
        );
    }
}

function PokazatVse() {

    if ($("#pokazat_vse").hasClass("not_active")) {
        return;
    }
    else {
        var all_pages = $(".ModulSsilokNaStraniciTablici").children();

        $(".TablicaTovarov .row_hower_table").remove();

        var links_to_get = [];

        $(all_pages).each(function (indx, element) {
            links_to_get.push($(element).attr("href"));
        });

        (function updateInfo(i) {
            if (i == links_to_get.length) {
                return;
            }
            $.ajax({
                type: "GET",
                url: links_to_get[i],
                success: function (data) {
                    var tablica_tovarov = $(data).find(".TablicaTovarov");
                    var tablica_tovarov_tovary = $(tablica_tovarov).find(".row_hower_table");
                    var last_item_now = $(".TablicaTovarov tr:last-child");
                    tablica_tovarov_tovary.insertAfter(last_item_now);
                }
            }).always(function () {
                updateInfo(i + 1);
            });
        })(0);


        $("#pokazat_vse").addClass("not_active");
        $("#pokazat_vse").html("Все товары показаны!");
        $("#pokazat_vse").parent().css("width", "100%");
        $("#pokazat_esche").parent().remove();
    }
}