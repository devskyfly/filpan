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
    //https://filpan/CreateItems/createItemsKartForprintKartochki.php?vendor=brother&vendor_name=Brother

    var vendor = "<?=$_GET["vendor"];?>";
    var vendor_name = "<?=$_GET["vendor_name"];?>";

    allitems = {};
    allprinters = {};

    var start_link_kartridzh = "https://www.tmshop.ru/cartridge/" + vendor;

    //Kartridzhi
    $.ajax({
        type: "GET",
        url: "createitemsFunctions.php",
        data: "link=" + start_link_kartridzh,
        success: function (data) {

            var tablica_tovarov_kartridzhi = $(data).find(".single-company-toners--toner");
            var tablica_tovarov_kartridzhi_tovary = tablica_tovarov_kartridzhi.find("a");
            processingInfo(tablica_tovarov_kartridzhi_tovary);
        }
    });

    function processingInfo(kartridzhi) {

        $(kartridzhi).each(function (indx) {
            var link = $(this).attr("href");
            var name = $(this).text();
            var temp_data_id = link.split("/");

            var id = temp_data_id[3];

            allitems[indx] = {};

            allitems[indx]["id"] = id;
            allitems[indx]["name"] = name;
            allitems[indx]["link"] = link;
        });

        sendInfo(allitems);
    }

    function sendInfo(allitems) {
        allitemsJson = JSON.stringify(allitems);

        $.ajax({
            type: "POST",
            url: "createitemsFunctions.php",
            data: "allitemsKartriges=" + allitemsJson + "&vendor_name="+vendor_name,
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
