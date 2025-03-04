<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["utilisateur"])){
		header("Location: login.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./style2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Accueil</title>
</head>

<body>
<div class="fond"></div>
<div class="header" style="background-color:#665264">
  <a href="index2.php" target="_blank"><img src="./smica.png" width="500"></a>
</div>

<div class="topnav">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Accueil</a>
  <a href="https://www.carnus.fr" target= "_blank "><i class="fa-solid fa-circle-info"></i> Info</a>
  <a href="logout.php" style="float:right"><i class="fa-solid fa-power-off"></i> Déconnexion</a>
  <a href="compte.php" style="float:right"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['utilisateur']; ?></a>
  
</div>
<br>
<div id="chart"></div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.35.2/dist/apexcharts.min.js"></script>
<script>
  var options = {
    series: [{
      name: 'Income',
      type: 'column',
      data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
    }, {
      name: 'Cashflow',
      type: 'column',
      data: [1.1, 3, 3.1, 4, 4.1, 4.9, 6.5, 8.5]
    }, {
      name: 'Revenue',
      type: 'line',
      data: [20, 29, 37, 36, 44, 45, 50, 58]
    }],
    chart: {
      height: 350,
      type: 'line',
      stacked: false
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      width: [1, 1, 4]
    },
    title: {
      text: 'XYZ - Stock Analysis (2009 - 2016)',
      align: 'left',
      offsetX: 110
    },
    xaxis: {
      categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016],
    },
    yaxis: [{
      seriesName: 'Income',
      axisTicks: {
        show: true,
      },
      axisBorder: {
        show: true,
        color: '#008FFB'
      },
      labels: {
        style: {
          colors: '#008FFB',
        }
      },
      title: {
        text: "Income (thousand crores)",
        style: {
          color: '#008FFB',
        }
      },
      tooltip: {
        enabled: true
      }
    }, {
      seriesName: 'Cashflow',
      opposite: true,
      axisTicks: {
        show: true,
      },
      axisBorder: {
        show: true,
        color: '#00E396'
      },
      labels: {
        style: {
          colors: '#00E396',
        }
      },
      title: {
        text: "Operating Cashflow (thousand crores)",
        style: {
          color: '#00E396',
        }
      },
    }, {
      seriesName: 'Revenue',
      opposite: true,
      axisTicks: {
        show: true,
      },
      axisBorder: {
        show: true,
        color: '#FEB019'
      },
      labels: {
        style: {
          colors: '#FEB019',
        },
      },
      title: {
        text: "Revenue (thousand crores)",
        style: {
          color: '#FEB019',
        }
      }
    }, ],
    tooltip: {
      fixed: {
        enabled: true,
        position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
        offsetY: 30,
        offsetX: 60
      },
    },
    legend: {
      horizontalAlign: 'left',
      offsetX: 40
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>


</body>
</html>


