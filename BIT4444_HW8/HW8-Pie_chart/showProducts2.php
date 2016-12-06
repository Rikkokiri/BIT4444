<!--
(4) Replace the bar chart in showProducts.php with a pie chart (e.g., http://bl.ocks.org/mbostock/3887235)
and save the file as showProducts2.php. (30 pts)
-->
<!DOCTYPE html>
<html>
<head>
  <title>Show Products - Pie chart</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />

  <style>

  .arc text {
    font: 12px sans-serif;
    text-anchor: middle;
  }

  .arc path {
    stroke: #fff;
  }

  svg {
    padding: 50;
  }

  </style>
  <body>
  <script src="//d3js.org/d3.v3.min.js"></script>
  <script>

  var supplierID = $("#selectSupplierID").val();


  var width = 960;
  var height = 600;

  var radius = Math.min(width, height-100) / 2;

  var color = d3.scale.ordinal()
      .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);

  var arc = d3.svg.arc()
      .outerRadius(radius - 10)
      .innerRadius(0);

  var labelArc = d3.svg.arc()
      .outerRadius(radius - 30)
      .innerRadius(radius - 30);

  var pie = d3.layout.pie()
      .sort(null)
      .value(function(d) { return d.StockValue; });

  d3.select("body").selectAll("svg").remove();

  var svg = d3.select("body").append("svg")
      .attr("width", width)
      .attr("height", height)
    .append("g")
      .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

  //----- GET THE DATA -----
  d3.json("getData.php?supplierID="+supplierID, function(error, data){
    if(error) throw error;

  //------------------------

    var g = svg.selectAll(".arc")
        .data(pie(data))
      .enter().append("g")
        .attr("class", "arc");

    g.append("path")
        .attr("d", arc)
        .style("fill", function(d) { return color(d.data.ProductName); });

    g.append("text")
        .attr("transform", function(d) { return "translate(" + labelArc.centroid(d) + ")"; })
        .attr("dy", ".35em")
        .text(function(d) { return d.data.ProductName; });
  });

  function type(d) {
    d.StockValue = +d.StockValue;
    return d;
  }

  </script>
  </body>
</html>
