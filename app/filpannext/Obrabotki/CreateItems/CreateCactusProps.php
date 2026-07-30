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

<? if (isset($_GET["vendor_id"]) && isset($_GET["go"])): ?>
    <script>
        //var vendor_id = "942";

        var vendor_id = "<?=$_GET["vendor_id"];?>";

        allitems = {};

        var start_link = "https://www.forum3.ru/?sklad=all&extra=all&vendor_id=7284&cmd=show_price&upcode=" + vendor_id;

        var url_data = start_link.split("?");

        var main_url = url_data[0];
        var args = encodeURIComponent(url_data[1]);


        //Printery
        $.ajax({
            type: "GET",
            url: "CreateCactusPropsFunction.php",
            data: "main_url=" + main_url + "&args=" + args,
            success: function (data) {

                var tablica_tovarov = $(data).find("table.catalogTable");
                var tablica_tovarov_tovary = tablica_tovarov.find("tr");

                processingInfo(tablica_tovarov_tovary);
            }
        });

        function processingInfo(tovary) {

            var ids = [];

            tovary=tovary.slice(1);

            $(tovary).each(function (indx) {

                var id = $(this).find(".colCode").text();
                var name = $(this).find(".colName a").text();
                var price = $(this).find(".colPrice:last").text();

                price = price.replace(/ /g, "");
                price = parseInt(price);

                allitems[indx] = {};
                allitems[indx]["id"] = id;
                allitems[indx]["name"] = name;
                allitems[indx]["price"] = price;

                ids[indx] = id;

            });

            (function getInfo(i) {
                if (i == ids.length) {
                //if (i == 1) {
                    sendInfo(allitems);
                    return;
                }

                var args = encodeURIComponent("cmd=show_tovar&code=" + ids[i]);

                $.ajax({
                    type: "GET",
                    url: "CreateCactusPropsFunction.php",
                    data: "main_url=" + main_url + "&args=" + args,
                    success: function (data) {

                        console.log(i + 1);

                        var picture = $(data).find('.productCardPic img');
                        var picture_src = $(picture).attr("src");
                        allitems[i]["picture"]=picture_src;

                        var tablica_kartridzha = $(data).find('table[itemprop="description"]');

                        var tablica_kartridzha_props = tablica_kartridzha.find("tr");

                        allitems[i]["props"] = {};

                        $(tablica_kartridzha_props).each(function (ind) {

                            var props = $(this).find("td");

                            var name="";
                            var value="";

                            $(props).each(function (ind_props) {
                                if($(this).hasClass("right"))
                                {
                                    value = $(this).text();
                                }
                                else
                                {
                                    name = $(this).text();
                                }
                            });

                            allitems[i]["props"][name]=value;
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
                url: "CreateCactusPropsFunction.php",
                data: "allitems=" + allitemsJson,
                success: function (data) {
                    console.log(data);
                }
            });
        }

    </script>

<? else:
    echo "Введите название производителя!";
endif; ?>

</body>
</html>
