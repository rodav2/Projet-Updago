$("select").change(function ()
{
    if($("select").find(":selected").attr("id") != "default")
    {

        var devoir = $("#Devoir").val();

        $.ajax({
            async: "true",
            type: "POST",
            url: "./global/ajax/listeNoteDevoir.php",
            data: "idDevoir="+ devoir,
            dataType: "json",
            error: function(errorData) 
            {
                alert(errorData);

            },
            success: function(data) 
            {
                var labels = [];
                var datas = [];
                jQuery.each(data, function (i, val)
                {
                    labels.push(i);
                    datas.push(val-1);
                });

                var datas = 
                {
                    labels: labels,
                    datasets: 
                    [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,1)",
                            strokeColor: "rgba(220,220,220,1)",
                            highlightFill: "rgba(220,220,220,1)",
                            highlightStroke: "rgba(220,220,220,1)",
                            data: datas
                        }
                    ]
                };

                var ctx = document.getElementById("myChart").getContext("2d");
                var myNewChart = new Chart(ctx).Bar(datas);
            }
        });

    }

    
});
