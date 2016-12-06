<!--
(2) Develop another PHP page, showProducts.php, that displays a bar chart. The bar chart displays the total in-stock value of each product
for a particular supplier. The y-axis of the bar chart shows the total in-stock value. The x-axis shows product names.
The total in-stock value is calculated as UnitInStock * UnitPrice. (30 pts)
-->
<!DOCTYPE html>
<html>
<head>
  <title>Show Products - Bar chart</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />

  <style>

  .bar {
    fill: green;
  }

  .bar:hover {
    fill: blue;
  }

  .axis--x path {

  }

  .axis text {
    font: 14px sans-serif;
  }

  </style>

</head>
<body>

  <svg width="960" height="500"></svg>
  <script src="https://d3js.org/d3.v4.min.js"></script>
  <script>

  var supplierID = $("#selectSupplierID").val();

  var svg = d3.select("svg"),
      margin = {top: 20, right: 20, bottom: 30, left: 40},
      width = +svg.attr("width") - margin.left - margin.right,
      height = +svg.attr("height") - margin.top - margin.bottom;

  var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
      y = d3.scaleLinear().rangeRound([height, 0]);
      console.log(y(3));

  var g = svg.append("g")
      .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


  //GET THE DATA
  d3.json("getData.php?supplierID="+supplierID, function(error, data){
    if(error) throw error;

    data.forEach(function(d){
      d.letter = d.ProductName;
      d.frequency = +d.StockValue;
    })

    if (error) throw error;


    x.domain(data.map(function(d) { return d.letter; }));
    y.domain([0, d3.max(data, function(d) { return d.frequency; })]);

    g.append("g")
        .attr("class", "axis axis--x")
        .attr("transform", "translate(0," + height + ")")
        .call(d3.axisBottom(x));

    g.append("g")
        .attr("class", "axis axis--y")
        .call(d3.axisLeft(y).ticks(4, "s"))
      .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("dy", "0.71em")
        .attr("text-anchor", "end")
        .text("Frequency");

    g.selectAll(".bar")
      .data(data)
      .enter().append("rect")
        .attr("class", "bar")
        .attr("x", function(d) { return x(d.letter); })
        .attr("y", function(d) { return y(d.frequency); })
        .attr("width", x.bandwidth())
        .attr("height", function(d) { return height - y(d.frequency); });
  });

  </script>
  </body>
  </html>
