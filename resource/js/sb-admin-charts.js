$(document).ready(function(){
    $.ajax({
      url: "http://localhost/m/chart/data.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var data = JSON.parse(data);
        var namo = [];
        var numo = [];

        for (var i in data)
        {
          namo.push(data[i].Month);
          numo.push(data[i].Ammount_Collected);
        }
        console.log(namo);

        var chartdata = {
          labels: namo,
          datasets:[
          {
              label: 'Marks Earned',
                backgroundColor: 'navy',
                borderColor:'green',
                data: numo  
          }
          ]
        }

        var ctx = $("#mycan");
        var bargraph = new Chart(ctx, {
          type:'bar',
          data: chartdata
        });

      },
      error: function(data) {
        console.log(data);
      }

    });
});