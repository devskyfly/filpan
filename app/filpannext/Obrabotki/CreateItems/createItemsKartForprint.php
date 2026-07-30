<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>

<body>

<?if(isset($_GET["vendor"]) && isset($_GET["go"])):?>

<script>
    //var vendor = "brother";
    ///filpannext/Obrabotki/CreateItems/createItemsKartForprint.php?vendor=Brother&vendor_name=brother&seria=dcp

    var vendor = "<?=$_GET["vendor"];?>";
    var vendor_name = "<?=$_GET["vendor_name"];?>";
    var seria = "<?=$_GET["seria"];?>";
    var seria_name = "<?=$_GET["seria_name"];?>";

    allitems = {};
    allprinters = {};

    var start_link_printer = "https://www.tmshop.ru/printer/" + vendor + "/" +seria;

    //Printery
    $.ajax({
        type: "GET",
        url: "createitemsFunctions.php",
        data: "link=" + start_link_printer,
        success: function (data) {
            var tablica_tovarov_printery = $(data).find(".row .col-md-4");
            var tablica_tovarov_printery_tovary = tablica_tovarov_printery.find("a");
            processingInfo(tablica_tovarov_printery_tovary);
        }
    });

    function processingInfo(printery) {

        var links = [];

        $(printery).each(function (indx) {
            var link = $(this).attr("href");
            var name = $(this).text();
            var temp_data_id = link.split("/");

            link = "https://www.tmshop.ru" + link;

            var id = temp_data_id[4];

            allitems[indx] = {};

            allprinters[indx] = {};
            allprinters[indx]["id"] = id;
            allprinters[indx]["name"] = vendor_name+" "+seria_name+" "+name;
            allprinters[indx]["kluchevoe_slovo"] = seria_name+" "+name;
            allprinters[indx]["seria"] = seria_name;
            allprinters[indx]["link"] = link;

            links[indx] = link;
        });

        (function getInfo(i) {
            if (i == links.length) {
            //if (i == 5) {
                sendInfo(allprinters);
                return;
            }
            $.ajax({
                type: "GET",
                url: "createitemsFunctions.php",
                data: "link=" + links[i],
                success: function (data) {

                    console.log(i+1);

                    var tablica_printerov = $(data).find(".device-cartridges");

                    var tablica_printerov_tovary = tablica_printerov.find(".device-cartridge-name");
                    var tablica_printerov_tovary_a = tablica_printerov_tovary.find("a");

                    allprinters[i]["kartriges"]= {};

                    $(tablica_printerov_tovary_a).each(function (ind) {

                        var name = $(this).text();

                        allprinters[i]["kartriges"][ind] = name;
                    });
                }
            }).always(function () {
                getInfo(i + 1);
            });
        })(0);
    }


    function sendInfo(allitems) {

        allitemsJson = JSON.stringify(allitems);
        $.ajax({
            type: "POST",
            url: "createitemsFunctions.php",
            data: "allitemsPrinters=" + allitemsJson + "&vendor_name="+vendor_name,
            success: function (data) {
                console.log(data);
            }
        });
    }

</script>

<?else:
echo"Введите название производителя!";
endif;?>

</body>
</html>
