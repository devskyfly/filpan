//PanelUpravleniya='https://www.filpan/filpannext/PanelUpravleniya/';
//YandexMarketFile='https://www.filpan/filpannext/Obrabotki/YandexMarketCSV.php';
//<?
//echo KURS_Dollara=
//?>

function getUrlVar() {
    var urlVar = window.location.search; // получаем параметры из урла
    var arrayVar = []; // массив для хранения переменных
    var valueAndKey = []; // массив для временного хранения значения и имени переменной
    var resultArray = []; // массив для хранения переменных
    arrayVar = (urlVar.substr(1)).split('&'); // разбираем урл на параметры
    if (arrayVar[0] == "") return false; // если нет переменных в урле
    for (i = 0; i < arrayVar.length; i++) { // перебираем все переменные из урла
        valueAndKey = arrayVar[i].split('='); // пишем в массив имя переменной и ее значение
        resultArray[valueAndKey[0]] = valueAndKey[1]; // пишем в итоговый массив имя переменной и ее значение
    }
    return resultArray; // возвращаем результат
}

function vibratElement(element) {
    if ($(element).prev("a").hasClass('Aktivnay')) {
        alert('Элемент не может ссылаться сам на себя.');
    }
    else {
        Roditel = $(element).parent().parent()[0];
        $('input[id=input_roditel]').val(Roditel.value);
    }
}

function vibratElementDlyaTovara(element) {

    Roditel = $(element).parent().parent()[0];
    $('input[id=input_menu_id]').val(Roditel.value);
}

function vibratElementIzZagolovka(element) {

    var Val = $(element).parent().attr('value')[0];
    $('input[id=input_roditel]').val(Val);

}
function vibratElementIzZagolovkaDlyaTovara(element) {

    var Val = $(element).parent().attr('value')[0];
    $('input[id=input_menu_id]').val(Val);
}


function priIzmeneniyiInputTablici(element) {
    var Stroka = $(element).parent().parent();

    if ($(element).hasClass('inputChislo')) {
        if ($.isNumeric($(element).val())) {


            try {
                if ($(element).prop('id') == 'ValutaRubl') {
                    // alert('ValutaRubl');
                    $(element).parent().parent().find('#ValutaDollar').val(Math.ceil($(element).val() / KursDollara * 100) / 100);
                }
                else if ($(element).prop('id') == 'ValutaDollar') {
                    // alert('ValutaDollar');
                    $(element).parent().parent().find('#ValutaRubl').val(Math.ceil($(element).val() * KursDollara / 10) * 10);
                }


            }
            catch (Error) {

            }

        }
        else {
            alert('Это не число');
            return;
        }

    }


    if ($(element).hasClass('inputText')) {

    }

    if ($(element).parent().parent().find('#valuta').val() == 1) {
        // alert($(element).parent().parent().find('#ValutaRubl').val());

        $(Stroka).find('#input_cena').val($(element).parent().parent().find('#ValutaRubl').val());

    }
    else {
        $(Stroka).find('#input_cena').val($(element).parent().parent().find('#ValutaDollar').val());
    }


    /*if($(element).prop('id')=="input_nazakaz"){
     if($(element).prop("checked")){
     //$(Stroka).find('#input_market').prop("checked",!$(Stroka).find('#input_nazakaz').prop("checked"));
     $(Stroka).find('#input_vnalichii').prop("checked",!$(Stroka).find('#input_nazakaz').prop("checked"));
     }
     }

     if($(element).prop('id')=="input_market"){
     /*if($(element).prop("checked")){
     $(Stroka).find('#input_nazakaz').prop("checked",!$(Stroka).find('#input_market').prop("checked"));
     }*/
    /*		if($(element).prop("checked")){
     $(Stroka).find('#input_vnalichii').prop("checked",$(Stroka).find('#input_market').prop("checked"));
     }
     }

     if($(element).prop('id')=="input_vnalichii"){

     if($(element).prop("checked")){
     $(Stroka).find('#input_nazakaz').prop("checked",!$(Stroka).find('#input_vnalichii').prop("checked"));
     }

     if(!$(element).prop("checked")){
     $(Stroka).find('#input_market').prop("checked",$(Stroka).find('#input_vnalichii').prop("checked"));
     }
     }*/


    StrokaParametrov = preobrazovatMassivParametrovVStrokuParametrov(preobrazovatInputTextVMassiv($(element).parent().parent().find("input[id*='input_']")));
//alert(StrokaParametrov);
    sohranitStrokuTablici(StrokaParametrov);
}

function otobrazitSoputstvuyushieyetovari() {
    var result = getUrlVar();
    var id = result['id'];
    $.get(PanelUpravleniya + "SoputstvuyushieTovariIUslugi/request/pokazatSoputstvuyushie.php?id=" + id, function (data, status) {console.log(data);
            $("#VerxniyDivSoputstvuyushieTovari").html(data);
        }
    );
}

function nachalniyeSobitiyaMenuSoputstvuyushiyeTovari() {
    $('body').delegate('#show_images', 'click', function () {
        ShowImagesToggle(this);
    });
    //$(".ElementSsilkaStraniciTablici").click(function( ){alert("!")});
    $('body').delegate('.SsilkaNaStranicuTablici', "click", function () {
        otobrazitPodrazdelPodchinenniyMenuPriNagatiiNaSsilkaNaStranicuTablici(this);
    });
    $('body').delegate('#input_svyazan', "click", function () {
        priNagatiiNaCheckboxSvizan(this);
    });
    $('body').delegate('.UdalitSvyaz', "click", function () {
        UdalitSvyaz(this);
    });


    $('li span').click(function () {
        otobrazitPodrazdelPodchinenniyMenu($(this).parent().val())
    });
    otobrazitSoputstvuyushieyetovari();
}

function UdalitSvyaz(Element) {
    var result = getUrlVar();
    var id = result['id'];
    $("#input_id[value='" + $(Element).next('input.id_tovara').val() + "']").parent().parent().find('#input_svyazan').removeAttr("checked")
    $.get(PanelUpravleniya + "SoputstvuyushieTovariIUslugi/request/udalitSvyaz.php?id=" + id + "&id_soput=" + $(Element).next('input.id_tovara').val(), function (data, status) {
        otobrazitSoputstvuyushieyetovari();
    });

}

function otobrazitPodrazdelPodchinenniyMenu(id_menu) {
    var result = getUrlVar();
    var id = result['id'];

    $.get(PanelUpravleniya + "SoputstvuyushieTovariIUslugi/request/poluchitPodrazdelPodchinenniyMenu.php?id_menu=" + id_menu + "&id=" + id, function (data, status) {
            $("#SrednayaKolonkaSredniyDivDlyaPaneliUpravleniya").html(data);
        }
    );
}

function priNagatiiNaCheckboxSvizan(Element) {
    var result = getUrlVar();
    var id = result['id'];

    var id_soput = $(Element).parent().parent().find("#input_id").val();

    if ($(Element).prop("checked")) {
        $.get(PanelUpravleniya + "SoputstvuyushieTovariIUslugi/request/dobavitSvyaz.php?id=" + id + "&id_soput=" + id_soput, function (data, status) {
            otobrazitSoputstvuyushieyetovari();
        });
    }
    else {
        $.get(PanelUpravleniya + "SoputstvuyushieTovariIUslugi/request/udalitSvyaz.php?id=" + id + "&id_soput=" + id_soput, function (data, status) {
            otobrazitSoputstvuyushieyetovari();
        });
    }
}


function otobrazitPodrazdelPodchinenniyMenuPriNagatiiNaSsilkaNaStranicuTablici(SsilkaNaStranicuTablici) {
    var result = getUrlVar();
    var id_menu = $(SsilkaNaStranicuTablici).parent().find('.menu_id').val();
    var stranica = $(SsilkaNaStranicuTablici).parent().find('.stranica').val();
    var id = result['id'];

    $.get(PanelUpravleniya + "SoputstvuyushieTovariIUslugi/request/poluchitPodrazdelPodchinenniyMenu.php?id_menu=" + id_menu + "&stranica=" + stranica + "&id=" + id, function (data, status) {
            $("#SrednayaKolonkaSredniyDivDlyaPaneliUpravleniya").html(data);
        }
    );


}


function nachalniyeSobitiyaPaneliUpravleniyaMenu() {
    try {
        $('body').delegate('#show_images', 'click', function () {
            ShowImagesToggle(this)
        });
        var ckeditor1 = CKEDITOR.replace('input_text_sverhu');
        AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor1});

        var ckeditor2 = CKEDITOR.replace('input_text_snizu');
        AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor2});
    }
    catch (Error) {

    }
    $('input,textarea').change(function () {
        $(this).removeClass("NeValidnoePoleVvodaDannixElementa")
    });
    $('#YandexMarket').click(function () {
        ObnovitYandexMarket()
    });
    $('#dobavitStroku').click(function () {
        dobavitStroku()
    });
    $('#udalitStroku').click(function () {
        udalitStroku()
    });
    $('#sozdatNoviyElement').click(function () {
        sozdatNoviyElement('Menu')
    });
//$('#sozdatNoviyElement').click(function( ){sozdatNoviyElement('Statya')});
    $('#sozdatNoviyElementTovarov').click(function () {
        sozdatNoviyElement('TovarUsluga')
    });
    $('#sohranit').click(function () {
        sohranit('Menu')
    });
    $('#kopirovat').click(function () {
        kopirovat()
    });
    $('#sozdat').click(function () {
        sozdat('Menu')
    });
    $('#udalit').click(function () {
        udalit()
    });
    $('body').delegate('.knopkaViboraElementa', "click", function () {
        vibratElement(this)
    });
    $('body').delegate('.knopkaViboraElementaIzZagolovka', "click", function () {
        vibratElementIzZagolovka(this)
    });
    $('.knopkaRaskritiyaGruppi').click(function () {
        RascritGruppu(this)
    });
    $('body').delegate('table[class=tablicaSsilok] input[type=checkbox]', "click", function () {
        sbrositOstalniyeGalochki(this)
    });
    $('ul.SpisokSsilokMenu li').hover(function () {
        priNavedeniiNaElementMenuFocus(this)
    }, function () {
        priNavedeniiNaElementMenuBlur(this)
    });
    $(".TablicaTovarov input").change(function () {
        priIzmeneniyiInputTablici(this)
    });
    $("#kurs").change(function () {
        IzmenitKurs(this)
    });
    /////If field with Priority Good changed, refresh name
    $(".polePriorityGoods").change(function () {
        PriorityGoods(this)
    });
    /////
}

function nachalniyeSobitiyaPaneliUpravleniyaElementTovarovUslug() {
    try {
        $('body').delegate('#show_images', 'click', function () {
            ShowImagesToggle(this)
        });
        var ckeditor3 = CKEDITOR.replace('input_opisanie');
        AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor3});

        var ckeditor4 = CKEDITOR.replace('input_dopolnitelnoe_opisanie');
        AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor4});

        var ckeditor5 = CKEDITOR.replace('input_textoviy_modul');
        AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor5});

        var ckeditor5 = CKEDITOR.replace('input_harakteristiki');
        AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor5});
    }
    catch (Error) {
    }
    $('input,textarea').change(function () {
        $(this).removeClass("NeValidnoePoleVvodaDannixElementa")
    });
    $('#YandexMarket').click(function () {
        ObnovitYandexMarket()
    });
    $('#dobavitStroku').click(function () {
        dobavitStroku()
    });
    $('#udalitStroku').click(function () {
        udalitStroku()
    });
    $('#sozdatNoviyElement').click(function () {
        sozdatNoviyElement('TovarUsluga')
    });
    $('#sohranit').click(function () {
        sohranit()
    });
    $('#kopirovat').click(function () {
        kopirovat()
    });
    $('#sozdat').click(function () {
        sozdat('TovarUsluga')
    });
    $('#udalit').click(function () {
        udalit()
    });
    $('body').delegate('.knopkaViboraElementa', "click", function () {
        vibratElementDlyaTovara(this)
    });
    $('body').delegate('.knopkaViboraElementaIzZagolovka', "click", function () {
        vibratElementIzZagolovkaDlyaTovara(this)
    });
    $('.knopkaRaskritiyaGruppi').click(function () {
        RascritGruppu(this)
    });
    $('body').delegate('table[class=tablicaSsilok] input[type=checkbox]', "click", function () {
        sbrositOstalniyeGalochki(this)
    });
    $('ul.SpisokSsilokMenu li').hover(function () {
        priNavedeniiNaElementMenuFocus(this)
    }, function () {
        priNavedeniiNaElementMenuBlur(this)
    });
    $(".TablicaTovarov input").change(function () {
        priIzmeneniyiInputTablici(this)
    });
    $("#kurs").change(function () {
        IzmenitKurs(this)
    });

    $("#input_market").change(function () {
        IzmeneniyeMarket(this)
    });
    $("#input_nazakaz").change(function () {
        IzmeneniyeNazakaz(this)
    });
    $("#input_vnalichii").change(function () {
        IzmeneniyeVnalichii(this)
    });

    $("#cenaVDollarax").change(function () {
        IzmeneniyeCeniVDollarah(this)
    });
    $("#cenaVRubliyah").change(function () {
        IzmeneniyeCeniVRubliah(this)
    });
    $("#input_valuta").change(function () {
        IzmeneniyeValuti(this)
    });

    $("#sgenerirovat_ssilku").click(function () {
        sgenerirovatSsilku(this)
    });
}


/*function IzmeneniyeMarket(element){
 if($('#input_market').prop("checked")){
 $('#input_nazakaz').prop("checked",!$('#input_market').prop("checked"));
 }

 if($('#input_market').prop("checked")){
 $('#input_vnalichii').prop("checked",$('#input_market').prop("checked"));
 }
 }

 function IzmeneniyeNazakaz(element){
 if($('#input_nazakaz').prop("checked")){
 //$('#input_market').prop("checked",!$('#input_nazakaz').prop("checked"));
 $('#input_vnalichii').prop("checked",!$('#input_nazakaz').prop("checked"));
 }

 }

 function IzmeneniyeVnalichii(element){
 if($(element).prop("checked")){
 $('#input_nazakaz').prop("checked",!$('#input_vnalichii').prop("checked"));
 }

 if(!$(element).prop("checked")){
 $('#input_market').prop("checked",$('#input_vnalichii').prop("checked"));

 }
 }*/


function IzmeneniyeCeni(element) {
    if ($.isNumeric($(element).val())) {
        $('#cenaS').val(Math.ceil($(element).val() / KursDollara * 100) / 100);
    }
    else {
        alert("Это не число!");
    }
}

function IzmeneniyeCeniS(element) {
    if ($.isNumeric($(element).val())) {
        $('#input_cena').val(Math.ceil($(element).val() * KursDollara / 10) * 10);
    }
    else {
        alert("Это не число!");
    }
}


function IzmeneniyeCeniVRubliah(element) {
    if ($.isNumeric($(element).val())) {
        $('#cenaVDollarax').val(Math.ceil($(element).val() / KursDollara * 100) / 100);
        if ($('#input_valuta').val() == 1) {
            $('#input_cena').val($('#cenaVRubliyah').val());
        }
        else if ($('#input_valuta').val() == 2) {
            $('#input_cena').val($('#cenaVDollarax').val());
        }
    }
    else {
        alert("Это не число!");
    }
}

function IzmeneniyeCeniVDollarah(element) {
    if ($.isNumeric($(element).val())) {
        $('#cenaVRubliyah').val(Math.ceil($(element).val() * KursDollara / 10) * 10);

        if ($('#input_valuta').val() == 1) {
            $('#input_cena').val($('#cenaVRubliyah').val());
        }
        else if ($('#input_valuta').val() == 2) {
            $('#input_cena').val($('#cenaVDollarax').val());
        }
    }
    else {
        alert("Это не число!");
    }
}

function IzmeneniyeValuti(element) {
    if ($('#input_valuta').val() == 1) {
        $('#input_cena').val($('#cenaVRubliyah').val());
    }
    else if ($('#input_valuta').val() == 2) {
        $('#input_cena').val($('#cenaVDollarax').val());
    }
}


function IzmenitKurs(element) {
    if ($.isNumeric($(element).val())) {
        $.post(PanelUpravleniya + "Request/kurs.php",
            {
                kurs: $(element).val()
            },
            function (data, status) {

            });
    }
    else {
        alert("Это не число!");
    }
}


function nachalniyeSobitiyaPaneliUpravleniyaStatya() {

//CKEDITOR.config.autoParagraph=false;
    try {

        var ckeditor1 = CKEDITOR.replace('input_text_statyi');
        AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor1});
    }
    catch (Error) {

    }
    $('body').delegate('#show_images', 'click', function () {
        ShowImagesToggle(this)
    });
    $('input,textarea').change(function () {
        $(this).removeClass("NeValidnoePoleVvodaDannixElementa")
    });
    $('#dobavitStroku').click(function () {
        dobavitStroku()
    });
    $('#udalitStroku').click(function () {
        udalitStroku()
    });

    $('#sozdatNoviyElement').click(function () {
        sozdatNoviyElement('Statya')
    });
    $('#sohranit').click(function () {
        sohranit()
    });
    $('#kopirovat').click(function () {
        kopirovat()
    });
    $('#sozdat').click(function () {
        sozdat('Statya')
    });
    $('#udalit').click(function () {
        udalit()
    });

    $('body').delegate('table[class=tablicaSsilok] input[type=checkbox]', "click", function () {
        sbrositOstalniyeGalochki(this)
    });
    $("#kurs").change(function () {
        IzmenitKurs(this)
    });
    $('ul.SpisokSsilokMenu li').hover(function () {
        priNavedeniiNaElementMenuFocus(this)
    }, function () {
        priNavedeniiNaElementMenuBlur(this)
    });
}


function nachalniyeSobitiyaPaneliUpravleniyaSvoystvo() {

//CKEDITOR.config.autoParagraph=false;
    $('body').delegate('#show_images', 'click', function () {
        ShowImagesToggle(this)
    });
    $('#dobavitStrokuZnacheniy').click(function () {
        dobavitStrokuZnacheniy()
    });
    $('#udalitStrokuZnacheniy').click(function () {
        udalitStrokuZnacheniy()
    });
    $('.raskritiyePlus').click(function () {
        dobavitStrokuKategoriy($(this))
    });
    $('#udalitStrokuKategoriy').click(function () {
        udalitStrokuKategoriy()
    });

    $('#sozdatNoviyElement').click(function () {
        sozdatNoviyElement('Svoystvo')
    });
    $('#sohranit').click(function () {
        sohranit("Svoystvo")
    });
    $('#kopirovat').click(function () {
        kopirovat()
    });
    $('#sozdat').click(function () {
        sozdat('Svoystvo')
    });
    $('#udalit').click(function () {
        udalit()
    });

    $('body').delegate('table[class=tablicaZnacheniy] input[type=checkbox]', "click", function () {
        sbrositOstalniyeGalochki(this)
    });
    $("#kurs").change(function () {
        IzmenitKurs(this)
    });
    $('ul.SpisokSsilokMenu li').hover(function () {
        priNavedeniiNaElementMenuFocus(this)
    }, function () {
        priNavedeniiNaElementMenuBlur(this)
    });
}


function sgenerirovatSsilku() {
    var id = $('#input_id');
    var nazvanie = $('#input_nazvanie');
    var kluchevoe_slovo = $('#input_kluchevoe_slovo');
    //var tip = $('#input_tip');
    //StrokaParametrov = 'id=' + encodeURIComponent(id.val()) + '&nazvanie=' + encodeURIComponent(nazvanie.val()) + '&tip=' + encodeURIComponent(tip.val());

    StrokaParametrov = '&nazvanie=' + encodeURIComponent(nazvanie.val()) + '&kluchevoe_slovo=' + encodeURIComponent(kluchevoe_slovo.val());

    $.ajax
    (
        {
            type: "POST",
            async: false,
            url: "request/sgenerirovatSsilkuNew.php",
            data: StrokaParametrov,
            success: function (msg) {
                if (id.val() == "") {
                    var StrokiTabliciSsilok = $('.tablicaSsilok tr');
                    var glavnaya_ssilka_input = $($('.tablicaSsilok tr')[0]).find(".redaktiruemayaSsilkaVTablice");
                    var glavnaya_ssilka_checkbox = $($('.tablicaSsilok tr')[0]).find("input[type=checkbox]");
                    if (glavnaya_ssilka_input.val().length == 0) {
                        glavnaya_ssilka_input.val(msg);
                        glavnaya_ssilka_checkbox.prop("checked", true);

                        if (ProveritSsilkuNovogoElementaizKlucha(msg) == 0) {
                            alert("Ключевое слово не уникально!");
                            glavnaya_ssilka_input.val("");
                            glavnaya_ssilka_checkbox.prop("checked", false);
                            return;
                        }
                    }
                }
                else {
                    alert(msg);
                }
            }
        }
    );
}

function priNavedeniiNaElementMenuFocus(Element) {
//alert(Element);
    $(Element).children("span.GruppaMenu").show();
//alert("?");
}

function priNavedeniiNaElementMenuBlur(Element) {
//alert(Element);
    $(Element).children("span.GruppaMenu").hide();
}


function sozdatNoviyElement(ElementUpravleniya) {
    if (confirm("Вы уверены что хотите создать новый элемент?")) {

    } else {
        return;
    }
    window.open(PanelUpravleniya + ElementUpravleniya);
}

function sohranit(ElementUpravleniya) {

    if (ElementUpravleniya != 'Svoystvo') {

        if (proverkaFormiTovarUsluga() == 0) {
            return;
        }
        if (!confirm("Игнорировать уникальность ссылок?")) {
            if (ProveritSsilkiSushestvuyushegoElementa() == 0) {
                alert("Ссылка не уникальна");
                return;
            }
        }
    }

    MassivParametrov = preobrazovatInputTextAreaVMassiv($("input[id*='input_']"), CKEDITOR, $("select[id*='input_']"), $("textarea[id*='input_'].BezCKEDITOR"));
    StrokaParametrov = preobrazovatMassivParametrovVStrokuParametrov(MassivParametrov);

    //console.log(MassivParametrov);
    //console.log(StrokaParametrov);

    var id_menu = $("#AktivniyElementMenu").val();

    if (ElementUpravleniya == 'Svoystvo') {

        StrokiTablici = $('table[class=tablicaKategoriy] tr');
        KolichestvoStrokTablici = StrokiTablici.length;

        var kategoriiSvoystva = [];

        for (iterator = 0; iterator < KolichestvoStrokTablici; iterator++) {
            var kategoriya = $(StrokiTablici[iterator]).find('input.redaktiruemayaSsilkaVTablice').val();
            var kategoriya_data = kategoriya.split(" ");

            if (kategoriya_data[0] != "") {
                kategoriiSvoystva.push(kategoriya_data[0]);
            }
        }

        StrokaParametrov += '&input_kategoriya=' + JSON.stringify(kategoriiSvoystva);

        $.ajax
        (
            {
                type: "POST",
                async: false,
                url: "request/sohranit.php",
                data: StrokaParametrov,
                success: function (msg) {
                    UdalitZnacheniyaSvoystva();
                    ZapisatZnacheniyaSvoystva();
                    window.location = window.location;
                }
            }
        )
    }
    else {
        $.ajax
        (
            {
                type: "POST",
                async: false,
                url: "request/sohranit.php",
                data: StrokaParametrov,
                success: function (msg) {
                    //alert(msg);
                    UdalitSsilkiElementa();
                    ZapisatSsilki();
                    window.location = window.location;
                }
            }
        )
    }


    if (ElementUpravleniya == 'Menu') {
        $.ajax
        (
            {
                type: "POST",
                async: false,
                url: "request/dopolnitelniyeDeystviyaPosleSohraneniya.php",
                data: StrokaParametrov,
                success: function (msg) {

                }
            }
        )
    }
}

function sohranitStrokuTablici(StrokaParametrov) {
    $.ajax
    (
        {
            type: "POST",
            async: false,
            url: "request/sohranit.php",
            data: StrokaParametrov,
            success: function (msg) {
                //alert(msg);
                //document.write(msg);
            }
        }
    )


}


function sozdat(ElementUpravleniya) {

    if (ElementUpravleniya != 'Svoystvo') {
        if (proverkaFormiTovarUsluga() == 0) {
            return;
        }
        if (ProveritSsilkiNovogoElementa() == 0) {
            alert("Ссылка не уникальна");
            return;
        }
    }

    MassivParametrov = preobrazovatInputTextAreaVMassiv($("input[id*='input_']"), CKEDITOR, $("select[id*='input_']"), $("textarea[id*='input_'].BezCKEDITOR"));
    StrokaParametrov = preobrazovatMassivParametrovVStrokuParametrov(MassivParametrov);

    if (ElementUpravleniya == 'Svoystvo') {
        $.ajax
        (
            {
                type: "POST",
                async: false,
                url: "request/sozdat.php",
                data: StrokaParametrov,
                success: function (msg) {
                    UdalitZnacheniyaSvoystva(msg);
                    ZapisatZnacheniyaSvoystva(msg);
                    window.location = PanelUpravleniya + ElementUpravleniya + '?id=' + msg;
                }
            }
        )
    }
    else {
        $.ajax
        (
            {
                type: "POST",
                async: false,
                url: "request/sozdat.php",
                data: StrokaParametrov,
                success: function (msg) {
                    UdalitSsilkiElementa(msg);
                    ZapisatSsilki(msg);
                    window.location = PanelUpravleniya + ElementUpravleniya + '?id=' + msg;
                }
            }
        )
    }

    if (ElementUpravleniya == 'Menu') {
        $.ajax
        (
            {
                type: "POST",
                async: false,
                url: "request/dopolnitelniyeDeystviyaPosleSohraneniya.php",
                data: StrokaParametrov,
                success: function (msg) {
                }
            }
        )
    }
}

function proverkaFormiTovarUsluga() {
    var KodVozvrata = 1;

    var ObyazatelniyePoliya = $('.ObyazatelnoyePole');
    var razmernost = ObyazatelniyePoliya.length;

    for (var iterator = 0; iterator < razmernost; iterator++) {
        if ($(ObyazatelniyePoliya[iterator]).val().length == 0) {
            $(ObyazatelniyePoliya[iterator]).addClass("NeValidnoePoleVvodaDannixElementa");
            alert("Не заполнено обязательное поле");
            KodVozvrata = 0;
        }
    }


    var elementi = $('table[class=tablicaSsilok] input[type=checkbox]');
    var KolichestvoElementov = elementi.lentgh;
    for (var iterator = 0; iterator <= KolichestvoElementov; iterator++) {
        if (elementi.val().length == 0) {
            alert("Ссылка не может быть пустой");
            KodVozvrata = 0;
        }
    }

    if (elementi.length == 0) {
        alert("Необходимо выбрать основную ссылку");
        KodVozvrata = 0;
    }


    var elementi = $('table[class=tablicaSsilok] input[type=checkbox]:checked');
    if (elementi.length == 0) {
        alert("Необходимо выбрать основную ссылку");
        KodVozvrata = 0;
    }

    return KodVozvrata;
}

function kopirovat() {
    if (confirm("Вы уверены что хотите копировать этот элемент?")) {

    } else {
        return;
    }
    window.open(window.location + "&copy=1");
}

function udalit() {
    if (confirm("Вы уверены что хотите удалить этот элемент?")) {

    } else {
        return;
    }
    UdalitSsilkiElementa($("input[id='input_id']").val());
    id = $("input[id='input_id']").val();
    StrokaParametrov = 'input_id=' + id;
    $.ajax
    (
        {
            type: "POST",
            async: false,
            url: "request/udalit.php",
            data: StrokaParametrov,
            success: function (msg) {
                window.location = 'index.php';
                //alert(msg);
                //alert('Позиция сохранена');
            }
        }
    )
}

function preobrazovatMassivParametrovVStrokuParametrov(MassivParametrov) {
    KolochestvoElementovMassivaParametrov = MassivParametrov.length;
    StrokaParametrov = '';
    for (iterator = 0; iterator < KolochestvoElementovMassivaParametrov; iterator++) {
        StrokaParametrov = StrokaParametrov + '&' + MassivParametrov[iterator].key + '=' + encodeURIComponent(MassivParametrov[iterator].val)
    }
    return StrokaParametrov;
}


function preobrazovatInputTextAreaVMassiv(PoliyaVvoda, CK, Spiski, Textarea) {
    var outArray = new Array();
    for (element in CK.instances) {
        Data = CK.instances[element].getData();
        var obj = new Object();
        obj =
            {
                key: element,
                val: Data,
            };
        outArray.push(obj);
    }

    razmernost = PoliyaVvoda.length;
    for (element1 = 0; element1 < razmernost; element1++) {
        var obj = new Object();


        if ($($(PoliyaVvoda)[element1]).attr('type') == 'hidden') {
            obj =
                {
                    key: PoliyaVvoda[element1].id,
                    val: PoliyaVvoda[element1].value,
                };
            outArray.push(obj);
        }

        if ($($(PoliyaVvoda)[element1]).attr('type') == 'text') {
            obj =
                {
                    key: PoliyaVvoda[element1].id,
                    val: PoliyaVvoda[element1].value,
                };
            outArray.push(obj);
        }
        if ($($(PoliyaVvoda)[element1]).attr('type') == 'checkbox') {

            if ($($(PoliyaVvoda)[element1]).prop("checked") == true) {
                obj =
                    {
                        key: PoliyaVvoda[element1].id,
                        val: 1,
                    };
                outArray.push(obj);
            }
            else {
                obj =
                    {
                        key: PoliyaVvoda[element1].id,
                        val: 0,
                    };
                outArray.push(obj);
            }
        }
    }


    var razmernost = Spiski.length;
    for (element2 = 0; element2 < razmernost; element2++) {
        obj =
            {
                key: Spiski[element2].id,
                val: $(Spiski[element2]).val(),
            };
        outArray.push(obj);
    }


    var razmernost = Textarea.length;
// console.log(Textarea.length);
// alert(Textarea.length);
    for (element3 = 0; element3 < razmernost; element3++) {
        obj =
            {
                key: Textarea[element3].id,
                val: $(Textarea[element3]).val(),
            };
        //alert(obj.key+obj.val);
        outArray.push(obj);
    }


    return outArray;
}

function preobrazovatInputTextVMassiv(PoliyaVvoda) {
    var outArray = new Array();
    razmernost = PoliyaVvoda.length;
    for (element1 = 0; element1 < razmernost; element1++) {
        var obj = new Object();

        if ($($(PoliyaVvoda)[element1]).attr('type') == 'text') {
            obj =
                {
                    key: PoliyaVvoda[element1].id,
                    val: PoliyaVvoda[element1].value,
                };
            outArray.push(obj);
        }

        if ($($(PoliyaVvoda)[element1]).attr('type') == 'hidden') {
            obj =
                {
                    key: PoliyaVvoda[element1].id,
                    val: PoliyaVvoda[element1].value,
                };
            outArray.push(obj);
        }

        if ($($(PoliyaVvoda)[element1]).attr('type') == 'checkbox') {

            if ($($(PoliyaVvoda)[element1]).prop("checked") == true) {
                obj =
                    {
                        key: PoliyaVvoda[element1].id,
                        val: 1,
                    };
                outArray.push(obj);
            }
            else {
                obj =
                    {
                        key: PoliyaVvoda[element1].id,
                        val: 0,
                    };
                outArray.push(obj);
            }
        }
    }

    return outArray;
}


/*Действия с таблицей ссылок*/
function dobavitStroku() {
    NovayaStroka = $('table[class=tablicaSsilok] tr:first').clone();
    NovayaStroka.find('input[class=redaktiruemayaSsilkaVTablice]').val('');
    NovayaStroka.find('input[type=checkbox]').each(function () {
        this.checked = ''
    });
    NovayaStroka.appendTo("table[class=tablicaSsilok]");
}

function udalitStroku() {
    if ($('table[class=tablicaSsilok] tr').length == 1) {
        alert('Невозможно удалить строку');
    }
    else {
        $('table[class=tablicaSsilok] tr:last').remove();
    }
}


function dobavitStrokuZnacheniy() {
    var NovayaStroka = $('table[class=tablicaZnacheniy] tr:first').clone();
    NovayaStroka.find('input[class=redaktiruemayaSsilkaVTablice]').val('');
    NovayaStroka.appendTo("table[class=tablicaZnacheniy]");
}

function udalitStrokuZnacheniy() {
    if ($('table[class=tablicaZnacheniy] tr').length == 1) {
        alert('Невозможно удалить строку');
    }
    else {
        $('table[class=tablicaZnacheniy] tr:last').remove();
    }
}

function udalitStrokuKategoriy() {
    if ($('table[class=tablicaKategoriy] tr').length == 1) {
        $('table[class=tablicaKategoriy] tr:first .redaktiruemayaSsilkaVTablice').val('');
    }
    else {
        $('table[class=tablicaKategoriy] tr:last').remove();
    }
}

function dobavitStrokuKategoriy(el) {
    var kat_id = el.parent().attr("value");
    var kat_name = el.next().text();
    if ($('table[class=tablicaKategoriy] tr').length == 0) {
        NovayaStroka = $('<tr class="strokaTabliciSsilok"><td><input type="text" class="redaktiruemayaSsilkaVTablice" value="' + kat_id + ' ' + kat_name + '" readonly></td></tr>');
        NovayaStroka.appendTo("table[class=tablicaKategoriy]");
    }
    else {
        var NovayaStroka = $('table[class=tablicaKategoriy] tr:first').clone();
        NovayaStroka.find('input[class=redaktiruemayaSsilkaVTablice]').val(kat_id + " " + kat_name);
        NovayaStroka.appendTo("table[class=tablicaKategoriy]");
    }
}

function sbrositOstalniyeGalochki(element) {
    if ($('table[class=tablicaSsilok] input[type=checkbox]:checked').length != 1) {
        $('table[class=tablicaSsilok] input[type=checkbox]:checked').each(function () {
            this.checked = ''
        });
        $(element).each(function () {
            this.checked = 'checked'
        });
    }
}


function ProverkaNaNalichieGalochkiOsnovnayaSsilka() {
    elementi = $('table[class=tablicaSsilok] input[type=checkbox]:checked')
    if (elementi == 0) {
        return false;
    }
    else {
        return true;
    }
}


function UdalitSsilkiElementa(id) {
    id = typeof id == 'undefined' ? $("input[id='input_id']").val() : id;
    StrokaParametrov = 'input_id=' + id;
    $.ajax
    (
        {
            type: "POST",
            async: false,
            url: "request/udalitSsilkiElementa.php",
            data: StrokaParametrov,
            success: function (msg) {
                //document.write(msg);
                //alert('Позиция сохранена');
            }
        }
    )
}


function ObnovitYandexMarket() {
	var data={
        	"tovar":$("#tovar_tip_vygruzki").val(),
        	"usluga":$("#usluga_tip_vygruzki").val()
        	};
	$.ajax
    (
        {
            method: "POST",
            data: data,
            async: false,
            url: YandexMarketFile,
            success: function (msg) {
                //	alert(msg);
                alert('Прайс YandexMarket обновлен.');
            }
        }
    )
}


function ProveritSsilkiSushestvuyushegoElementa() {
    var Otvet = 1;
    var TablicaSsilok = $(".tablicaSsilok :text");
    var KolichestvoStrok = TablicaSsilok.length;
    var id = $("#input_id").val();
    for (var iterator = 0; iterator < KolichestvoStrok; iterator++) {
        var StrokaParametrov = "ssilka=" + encodeURIComponent($(TablicaSsilok[iterator]).val()) + "&id=" + id;
        $.ajax
        (
            {
                type: "POST",
                async: false,
                url: "request/proverkaSuhestvuyushegoElementa.php",
                data: StrokaParametrov,
                success: function (msg) {
                    //document.write(msg);
                    if (msg == 0) {
                        Otvet = 0;
                        $(TablicaSsilok[iterator]).addClass("NeValidnoePoleVvodaDannixElementa");
                    }
                    ;
                }
            }
        )

    }
    return Otvet;
}

function ProveritSsilkiNovogoElementa() {
    var Otvet = 1;
    var TablicaSsilok = $(".tablicaSsilok :text");
    var KolichestvoStrok = TablicaSsilok.length;
    var id = $("#input_id").val();
    for (var iterator = 0; iterator < KolichestvoStrok; iterator++) {
        var StrokaParametrov = "ssilka=" + encodeURIComponent($(TablicaSsilok[iterator]).val()) + "&id=" + id;

        $.ajax
        (
            {
                type: "POST",
                async: false,
                url: "request/proverkaNovogoElementa.php",
                data: StrokaParametrov,
                success: function (msg) {
                    //document.write(msg);
                    if (msg == 0) {
                        Otvet = 0;
                        $(TablicaSsilok[iterator]).css("color", "red");
                    }
                    ;
                }
            }
        )

    }
    return Otvet;
}

function ProveritSsilkuNovogoElementaizKlucha(url) {
    var Otvet = 1;
    var StrokaParametrov = "ssilka=" + encodeURIComponent(url);
    $.ajax
    (
        {
            type: "POST",
            async: false,
            url: "request/proverkaNovogoElementa.php",
            data: StrokaParametrov,
            success: function (msg) {
                if (msg == 0) {
                    Otvet = 0;
                }
            }
        }
    );

    return Otvet;
}

function ZapisatSsilki(id) {
    id = typeof id == 'undefined' ? $("input[id='input_id']").val() : id;
    StrokiTablici = $('table[class=tablicaSsilok] tr');

    KolichestvoStrokTablici = StrokiTablici.length;
    for (iterator = 0; iterator < KolichestvoStrokTablici; iterator++) {
        ssilka = $(StrokiTablici[iterator]).find('input.redaktiruemayaSsilkaVTablice').val();
        osnovnaya = $(StrokiTablici[iterator]).find('input[type=checkbox]')[0].checked;

        if (osnovnaya == true) {
            osnovnaya = 1;
        }
        else {
            osnovnaya = 0;
        }
        StrokaParametrov = 'input_id=' + id + '&input_ssilka=' + encodeURIComponent(ssilka) + '&input_osnovnaya=' + osnovnaya;


        console.log();
        $.ajax
        (
            {
                type: "POST",
                async: false,
                url: "request/dobavitSsilkuElementa.php",
                data: StrokaParametrov,
                success: function (msg) {
                    //alert(msg);
                    //document.write(msg);
                    //alert('Позиция сохранена');
                }
            }
        )
    }

}

function UdalitZnacheniyaSvoystva(id) {
    id = typeof id == 'undefined' ? $("input[id='input_id']").val() : id;
    StrokaParametrov = 'input_id=' + id;

    $.ajax
    (
        {
            type: "POST",
            async: false,
            url: "request/udalitZnacheniyaElementa.php",
            data: StrokaParametrov,
            success: function (msg) {
                //document.write(msg);
                //alert('Позиция сохранена');
            }
        }
    )
}

function ZapisatZnacheniyaSvoystva(id) {
    id = typeof id == 'undefined' ? $("input[id='input_id']").val() : id;

    var StrokiTablici = $('table[class=tablicaZnacheniy] tr');
    var KolichestvoStrokTablici = StrokiTablici.length;
    for (iterator = 0; iterator < KolichestvoStrokTablici; iterator++) {
        var znachenie = $(StrokiTablici[iterator]).find('input.redaktiruemayaSsilkaVTablice').val();

        if (znachenie != "") {
            StrokaParametrov = 'input_id=' + id + '&input_znacheniye=' + encodeURIComponent(znachenie);

            $.ajax
            (
                {
                    type: "POST",
                    async: false,
                    url: "request/dobavitZnacheniyaElementa.php",
                    data: StrokaParametrov,
                    success: function (msg) {
                        //alert(msg);
                        //document.write(msg);
                        //alert('Позиция сохранена');
                    }
                }
            )
        }
    }
}

function ShowImagesToggle(el) {
    //alert($(el).prop('checked'));

    if ($(el).prop('checked') == true) {
        $.post('/filpannext/PanelUpravleniya/ajax/ToggleShowImages.php', {'ShowImages': '1'}).done(function (data) {
        });
    } else {
        $.post('/filpannext/PanelUpravleniya/ajax/ToggleShowImages.php', {'ShowImages': '0'}).done(function (data) {
        });
    }
}

function TipVygruzkiToggle(el) {
	$.post('/filpannext/PanelUpravleniya/ajax/ToggleTipVygruzki.php', {'TipVygruzki': $(el).val()}).done(function (data) {
    });
}

function PokazOpisaniyaToggle(el) {
	$.post('/filpannext/PanelUpravleniya/ajax/TogglePokazOpisaniya.php', {'PokazOpisaniya': $(el).val()}).done(function (data) {
    });
}

/////
function PriorityGoods(element) {
    if ($.isNumeric($(element).val())) {

        var id_menu = $("#AktivniyElementMenu").val();
        $.post("request/priorityGoods.php",
            {
                id: $(element).val(),
                menu_id: id_menu
            },
            function (data, status) {
                if (data == "already_add") {
                    $(element).val("");
                    $(element).next().empty();
                    alert("Элемент с введенным ID уже добавлен в эту категорию!");
                }
                else if (data == 0) {
                    $(element).val("");
                    $(element).next().empty();
                    alert("Произошла ошибка! Проверьте ID!")
                }
                else {
                    $(element).next().html(data);
                }
            });
    }
    else {

        if ($(element).val().length > 0) {
            alert("Неверный ID товара!");
        }

        $(element).val("");
        $(element).next().empty();
    }
}
/////

function RazvernutSvernutKontent(element) {
    $(element).next().fadeToggle('fast', function () {

            if ($(element).hasClass('kontrentRazvernut')) {
                $(element).children("span").html('Раскрыть');
                $(element).removeClass('kontrentRazvernut');
                $(element).addClass('kontrentSvernut');
            }
            else if ($(element).hasClass('kontrentSvernut')) {
                $(element).children("span").html('Скрыть');
                $(element).removeClass('kontrentSvernut');
                $(element).addClass('kontrentRazvernut');
            }
        }
    );
}

$(document).ready(function(){
	//Выбор типа выгрузки
	$('body').delegate('#tip_vygruzki', 'change', function () {
        TipVygruzkiToggle(this)
    });
	//Выбор способа вывода описания в подгрупах и карточке
	$('body').delegate('#pokaz_opisaniya', 'change', function () {
        PokazOpisaniyaToggle(this)
    });
	
	$('#GlavniyDIV').append('<span class="toTopButton">^</span>');
	$(window).scroll(function(){
		if ($(this).scrollTop() > 400) {
			$('.toTopButton').fadeIn(800);
		} else {
			$('.toTopButton').fadeOut(800);
		}
	});	
	
	$('.toTopButton').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
	});
	
	$('.kontrentSvernut').click(function () {
		RazvernutSvernutKontent(this)
	});
	$('.kontrentRazvernut').click(function () {
		RazvernutSvernutKontent(this)
	});
	
	
	
	
	
	function insertTextAtCursor(el, text, offset) {
    var val = el.value, endIndex, range, doc = el.ownerDocument;
		if (typeof el.selectionStart == "number"
				&& typeof el.selectionEnd == "number") {
			endIndex = el.selectionEnd;
			el.value = val.slice(0, endIndex) + text + val.slice(endIndex);
			el.selectionStart = el.selectionEnd = endIndex + text.length+(offset?offset:0);
		} else if (doc.selection != "undefined" && doc.selection.createRange) {
			el.focus();
			range = doc.selection.createRange();
			range.collapse(false);
			range.text = text;
			range.select();
		}
	}
	
	$('#peremennaya_keyword').click(function () {
		var field=$(getSelection().anchorNode).children();
		if($(field).hasClass("name_field"))
		{
			insertTextAtCursor(document.getElementById($(getSelection().anchorNode).children().attr("id")),'{{ITEM_KEYWORD}}');
		}
		else
		{
			alert('Эту переменную можно добавить только в поля "Название"');
		}
	});
	
	$('#peremennaya_imya').click(function () {
		var field=$(getSelection().anchorNode).children();
		if($(field).hasClass("seo_field"))
		{
			insertTextAtCursor(document.getElementById($(getSelection().anchorNode).children().attr("id")),'{{ITEM_NAME}}');
		}
		else
		{
			alert('Эту переменную можно добавить только в поля "Title", "Description", "Keywords"');
		}
	});
	$('#peremennaya_imya_razdela').click(function () {
		var field=$(getSelection().anchorNode).children();
		if($(field).hasClass("seo_field"))
		{
			insertTextAtCursor(document.getElementById($(getSelection().anchorNode).children().attr("id")),'{{SECTION_NAME}}');
		}
		else
		{
			alert('Эту переменную можно добавить только в поля "Title", "Description", "Keywords"');
		}
	});
});

