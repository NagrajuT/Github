//function DrawChart(e, chartType, dataSource)
//{
//  var ctx = e.getContext('2d');
//  var chartData = GetChartData(dataSource)
//
//  var myChart = new Chart(ctx, {
//    type: chartType,
//    data: chartData
//  });
//}
//
//function GetChartData(type)
//{
//  // This will come from the database
//  var data = {
//    labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
//    datasets: [{
//      label: 'Registered Users',
//      data: [0, 1, 0, 1, 6, 3, 7],
//      backgroundColor: "rgba(0, 102, 204,0.6)"
//    }, {
//      label: 'Subscribed Users',
//      data: [2, 29, 5, 5, 2, 3, 10],
//      backgroundColor: "rgba(0, 153, 153,0.6)"
//    }]
//  }
//  
//  return(data);
//}
//
//var elem = document.getElementById('myChart');
//DrawChart(elem, 'line', 'Performance');


//function DrawChart(e, chartType, dataSource)
//{
//  var ctx = e.getContext('2d');
//  var chartData = GetChartData(dataSource)
//
//  var myChartM = new Chart(ctx, {
//    type: chartType,
//    data: chartData
//  });
//}
//
//function GetChartData(type)
//{
//  // This will come from the database
//  var data = {
//    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
//    datasets: [{
//      label: 'Registered Users',
//      data: [12, 19, 3, 17, 6, 3, 7, 15, 4, 12, 2, 4],
//      backgroundColor: "rgba(0, 102, 204,0.6)"
//    }, {
//      label: 'Subscribed Users',
//      data: [2, 29, 5, 5, 2, 3, 10, 8, 5, 14, 7, 4],
//      backgroundColor: "rgba(0, 153, 153,0.6)"
//    }]
//  }
//  
//  return(data);
//}
//
//var elem = document.getElementById('myChartM');
//DrawChart(elem, 'line', 'Performance');
//
//function DrawChart(e, chartType, dataSource)
//{
//  var ctx = e.getContext('2d');
//  var chartData = GetChartData(dataSource)
//
//  var myChartY = new Chart(ctx, {
//    type: chartType,
//    data: chartData
//  });
//}
//
//function GetChartData(type)
//{
//  // This will come from the database
//  var data = {
//    labels: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017'],
//    datasets: [{
//      label: 'Registered Users',
//      data: [0, 19, 3, 17, 6, 3, 7, 15],
//      backgroundColor: "rgba(0, 102, 204,0.6)"
//    }, {
//      label: 'Subscribed Users',
//      data: [0, 29, 5, 5, 2, 3, 10, 8],
//      backgroundColor: "rgba(0, 153, 153,0.6)"
//    }]
//  }
//  
//  return(data);
//}
//
//var elem = document.getElementById('myChartY');
//DrawChart(elem, 'line', 'Performance');
//
