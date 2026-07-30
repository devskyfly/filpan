<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
</head>

<body>

<? if (isset($_GET["vendor"]) && isset($_GET["go"])): ?>
    <script>
        //var vendor = "brother";

        var vendor_id = "<?=$_GET["vendor"];?>";

        var tovary = [];

        var allitems = {};

        var pages_count = 0;

        function get_src(page_number) {
            var start_link = "https://www.xcom-shop.ru/catalog/rashodnye_materialy/kartridzhi/kartridzhi_sovmestimye/nvp/" + vendor_id + '_sovmestimye_kartridzhi_nvp/?list_page=' + page_number;

            var tablica_tovarov = [];
            var tablica_tovarov_tovary = [];

            $.ajax({
                type: "GET",
                url: "CreateNvPrintFunctions.php",
                data: "main_url=" + start_link,
                success: function (data) {

                    if (page_number == 1) {
                        var pages = $(data).find(".navigation span");
                        pages_count = pages.length;
                    }

                    tablica_tovarov = $(data).find(".catalog-goods");
                    tablica_tovarov_tovary = tablica_tovarov.find(".wrap");

                    $(tablica_tovarov_tovary).each(function (indxt) {
                        tovary.push($(this));
                    });

                    if (pages_count > 1 && page_number <= pages_count) {
                        get_src(page_number + 1);
                    }
                    else {
                        processingInfo(tovary);
                    }
                }
            });
        }

        function processingInfo(tovary) {

            var links = [];

            $(tovary).each(function (indx) {

                var art_src = $(this).find(".key").text();
                var art_data=art_src.split(':');
                var art=$.trim(art_data[1]);
                var keyword = $(this).find(".name").text();
                var price = $(this).find(".price").text();
                var link = $(this).find(".name a").attr("href");

                price = price.replace(/ /g, "");
                price = parseInt(price);

                allitems[indx] = {};
                allitems[indx]["art"] = art;
                allitems[indx]["keyword"] = keyword;
                allitems[indx]["price"] = price;

                links[indx] = 'https://www.xcom-shop.ru' + link;
            });

            (function getInfo(i) {
                if (i == links.length) {
                //if (i == 1) {
                    sendInfo(allitems);
                    return;
                }

                $.ajax({
                    type: "GET",
                    url: "CreateNvPrintFunctions.php",
                    data: "main_url=" + links[i],
                    success: function (data) {

                        console.log(i + 1);

                        var name = $.trim($(data).find('h1').text().replace(/\s+/g,' '));
                        allitems[i]["name"] = name;

                        var picture_src = $(data).find('img.card-image').attr("src");
                        allitems[i]["picture"] = picture_src;

                        var tablica_kartridzha = $(data).find('.prop-column.left');

                        var tablica_kartridzha_props = tablica_kartridzha.find(".short_desc.prop-line:not(.delimiter)");

                        allitems[i]["props"] = {};

                        $(tablica_kartridzha_props).each(function (ind) {

                            var name = "";
                            var value = "";

                            name = $.trim($(this).find(".call").text().replace(/\s+/g,' '));
                            value = $.trim($(this).find(".prop-value").text().replace(/\s+/g,' '));

                            allitems[i]["props"][name] = value;
                        });
                    }
                }).always(function () {
                    getInfo(i + 1);
                });
            })(0);
        }


        function sendInfo(allitems) {

            //console.log(allitems);

            var allitemsJson = JSON.stringify(allitems);

            $.ajax({
                type: "POST",
                url: "CreateNvPrintFunctions.php",
                data: "allitems=" + allitemsJson,
                success: function (data) {
                    console.log(data);
                }
            });
        }

        get_src(1);

    </script>

<? else:
    echo "Введите название производителя!";
endif; ?>

</body>
</html>
