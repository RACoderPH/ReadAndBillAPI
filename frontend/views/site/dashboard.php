<?php

/** @var yii\web\View $this */
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;



use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-dashboard">




    <head>
        <!-- bootstrap link -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- css link -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- favicon logo -->
        <link rel="shortcut icon" type="image/png" href="img/favicon.jpg">
        <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/88ed3fe80b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Pagination Table -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> -->
        <!-- <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous"> -->
        <link href="css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

            body {
                font-family: 'Roboto', sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                background-color: #f4f6f9;
                color: #333;
            }

            /* Sidebar Styling */
            nav {
                background: linear-gradient(135deg, #004085 0%, #002752 100%);
                color: white;
                width: 220px;
                min-height: 100vh;
                padding: 20px;
                position: fixed;
                left: 0;
                transition: all 0.3s ease;
                box-shadow: 4px 0 12px rgba(0, 0, 0, 0.2);
                z-index: 99;
            }

            nav img {
                width: 80%;
                margin-bottom: 20px;
                border-radius: 12px;
            }

            nav a {
                color: white;
                text-decoration: none;
                padding: 12px;
                display: flex;
                align-items: center;
                margin-bottom: 10px;
                border-radius: 8px;
                transition: all 0.3s ease;
            }

            nav i {
                margin-right: 10px;
            }

            nav a:hover {
                text-decoration: none;
                color: white;
                background-color: rgba(255, 255, 255, 0.2);
            }

            .submenu {
                display: none;
                padding-left: 20px;
            }

            .submenu a {
                font-size: 0.9rem;
                padding: 8px 0;
                color: white;
            }

            .submenu.open {
                display: block;
            }

            /* Content Area */
            .content {
                margin-left: 400px;
                /* Matches the sidebar width */
                padding: 40px;
                display: flex;
                width: 100%;
                /* Flexbox to center content */
                flex-direction: column;

                /* Center vertically */
                align-items: center;
                /* Center horizontally */
                height: 100vh;
                /* Full viewport height for vertical centering */
                text-align: center;
            }


            .content h1,
            h2 {
                color: #333;
            }


            .image-card {
                width: 100%;
                max-width: 300px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
                border-radius: 15px;
                background: linear-gradient(135deg, #f0f4f8, #e7eff6);
                overflow: hidden;
                padding: 20px;
                transition: all 0.3s ease-in-out;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                transform-origin: center;
                animation: fadeIn 0.5s ease;
            }

            .image-card:hover {
                transform: scale(1.05);
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
                transition: all 0.3s ease-in-out;

                transform-origin: center;
            }

            .image-card h3 {
                font-weight: bold;
                font-size: 1.6rem;
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            }

            .image-card p {
                font-size: 1.2rem;
                font-weight: bold;
                color: #555;
                margin-top: 10px;
            }

            /* Smooth fade-in animation */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: scale(0.95);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }



            .image-card p {
                margin-top: 10px;
                font-size: 1rem;
                color: #555;
            }

            /* Pastel Colors */
            /* Pastel Colors */
            .bg-pastel1 {
                background: linear-gradient(135deg, #004085 0%, #002752 100%);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .bg-pastel2 {
                background: linear-gradient(135deg, #004085 0%, #002752 100%);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .bg-pastel3 {
                background: linear-gradient(135deg, #004085 0%, #002752 100%);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .bg-pastel4 {
                background: linear-gradient(135deg, #004085 0%, #002752 100%);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .bg-pastel5 {
                background: linear-gradient(135deg, #004085 0%, #002752 100%);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .bg-pastel6 {
                background: linear-gradient(135deg, #004085 0%, #002752 100%);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            /* Hover effect */
            .image-card:hover {
                transform: scale(1.05);
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
                transition: all 0.3s ease-in-out;
            }
            .version-info {
    position: absolute;
    bottom: 20px;
    left: 20px;
    color: white;
    font-size: 0.9rem;
    text-align: left;
}

        </style>
    </head>

    <body>

        <!-- Sidebar -->
        <nav id="sidebar">
            <?= Html::img('@web/images/BWDLOGO.png', ['alt' => 'Baliwag Water District Logo']) ?>
            <?= Html::a('<i class="fas fa-home"></i> Home', ['/site/index']) ?>
            <?= Html::a('<i class="fas fa-tachometer-alt"></i> Dashboard', ['/site/dashboard']) ?>
            <?= Html::a('<i class="fas fa-tint"></i> Readings', ['/site/reading']) ?>
            <?= Html::a('<i class="fas fa-users"></i> Mobile Users', ['/site/view']) ?>
            <?= Html::a('<i class="fas fa-info-circle"></i> About', ['/site/about']) ?>

            <hr>

            <!-- Login/Logout Logic -->
            <?php if (Yii::$app->user->isGuest): ?>
                <?= Html::a('<i class="fas fa-sign-in-alt"></i> Login', ['/site/login'], ['class' => 'btn btn-link text-decoration-none text-white']) ?>
            <?php else: ?>
                <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex']) ?>
                <?= Html::submitButton(
                    '<i class="fas fa-sign-out-alt"></i> Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link text-decoration-none text-white']
                ) ?>
                <?= Html::endForm() ?>
            <?php endif; ?>
            <div class="version-info">
            <?= Html::tag('i', '', ['class' => 'fas fa-code-branch']) . ' Version 1.0.0' ?>

    </div>
        </nav>

        <!-- Content -->
        <div class="content">
            <div class="d-flex justify-content-between align-items-start flex-wrap" style="gap: 15px; padding: 20px;">

                <!-- Box 1 -->
                <div class="image-card p-4 bg-pastel1 rounded shadow d-flex align-items-center">
                    <i class="fas fa-briefcase fa-4x text-white me-3"></i>
                    <div>
                        <h3 class="text-white mt-2">Job Orders</h3>
                        <p class="text-white mt-1"><?php echo $dataCount ?></p>
                    </div>
                </div>

                <!-- Box 2 -->
                <div class="image-card p-4 bg-pastel2 rounded shadow d-flex align-items-center">
                    <i class="fas fa-users fa-4x text-white me-3"></i>
                    <div>
                        <h3 class="text-white mt-2">Accounts</h3>
                        <p class="text-white mt-1">0</p>
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="image-card p-4 bg-pastel3 rounded shadow d-flex align-items-center">
                    <i class="fas fa-book fa-4x text-white me-3"></i>
                    <div>
                        <h3 class="text-white mt-2">Read & Visited</h3>
                        <p class="text-white mt-1">0</p>
                    </div>
                </div>

                <!-- Box 4 -->
                <div class="image-card p-4 bg-pastel4 rounded shadow d-flex align-items-center">
                    <i class="fas fa-hourglass-half fa-4x text-white me-3"></i>
                    <div>
                        <h3 class="text-white mt-2">Remaining</h3>
                        <p class="text-white mt-1">0</p>
                    </div>
                </div>

                <!-- Box 5 -->
                <div class="image-card p-4 bg-pastel5 rounded shadow d-flex align-items-center">
                    <i class="fas fa-tint fa-4x text-white me-3"></i>
                    <div>
                        <h3 class="text-white mt-2">Consumption</h3>
                        <p class="text-white mt-1">0</p>
                    </div>
                </div>

                <!-- Box 6 -->
                <div class="image-card p-4 bg-pastel6 rounded shadow d-flex align-items-center">
                    <i class="fas fa-file-invoice-dollar fa-4x text-white me-3"></i>
                    <div>
                        <h3 class="text-white mt-2">Bill</h3>
                        <p class="text-white mt-1">0</p>
                    </div>
                </div>
            </div>
            <!-- <?php
            //var_dump($this->params); //check if has data
            // Access data provider directly from the view
            // echo "Total Reading Data: " . $dataCount; 
            ?>
                    <?php //if (isset($dataCount)) { ?> <p>Total Reading Data: <?//= //$dataCount ?></p>
                    <?php //} ?>  -->
            <!-- Place the pie chart inside a table element -->
            <table class="table table-striped table-hover table-bordered align-middle shadow-sm rounded-3">
                <tr>
                    <th class="text-center" colspan="2">Analytical Analysis</th>
                </tr>
                <!-- Billing Category Data -->
                <tr>
                    <td>
                        <!-- Pie Chart Placeholder -->
                        <div id="piechart_3d"
                            style="width: 800px; height: 500px; margin: 0 auto; padding: 20px; overflow: hidden; border-radius: 15px; background: #f8f9fa;">
                        </div>
                    </td>
                    <td>
                        <!-- Additional Information -->
                        <h5>Category Breakdown</h5>
                        <p><strong>Overview:</strong> This table displays billing information categorized into different
                            segments including residential, commercial, and government accounts.</p>
                        <ul class="list-group mt-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Residential <span class="badge bg-primary rounded-pill" id="res_percentage">0%</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Commercial A <span class="badge bg-info rounded-pill" id="com_a_percentage">0%</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Commercial B <span class="badge bg-warning rounded-pill" id="com_b_percentage">0%</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Commercial IND <span class="badge bg-danger rounded-pill"
                                    id="com_ind_percentage">0%</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Government <span class="badge bg-success rounded-pill" id="gov_percentage">0%</span>
                            </li>
                        </ul>
                        <p><strong>Insights:</strong> The largest segment is Residential, followed by Commercial and
                            Government sectors. Analyze trends to optimize billing strategies.</p>
                    </td>
                </tr>
                <!-- Remarks Data -->
                <tr>
                    <td>
                        <!-- Remarks Breakdown -->
                        <h5>Remarks Breakdown</h5>

                        <!-- Breakdown Information -->
                        <div class="mt-4">
                            <h6><strong>Details by Category</strong></h6>
                            <ul class="list-group mt-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    High Consumption <span class="badge bg-primary rounded-pill"
                                        id="high_consumption_percentage"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Closed Accounts <span class="badge bg-info rounded-pill"
                                        id="closed_percentage"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Below Average <span class="badge bg-warning rounded-pill"
                                        id="below_average_percentage"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Not In Use <span class="badge bg-success rounded-pill"
                                        id="not_in_use_percentage"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Low Consumption <span class="badge bg-secondary rounded-pill"
                                        id="low_consumption_percentage"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Others <span class="badge bg-dark rounded-pill" id="others_percentage"></span>
                                </li>
                            </ul>

                            <!-- Insights Section -->
                            <div class="mt-4 p-3 bg-light rounded">
                                <h6><strong>Insights</strong></h6>
                                <p><strong>1. Dominance of High Consumption:</strong> The 'High Consumption' category
                                    takes up the largest share, indicating areas where energy or resources are
                                    significantly utilized.</p>
                                <p><strong>2. Closed Accounts:</strong> A notable <span id="closed_percentage"></span>of accounts are closed, suggesting
                                    opportunities for reconnection or optimizing account management strategies.</p>
                                <p><strong>3. Below Average Consumption:</strong> Around 15% fall under the 'Below
                                    Average' category, which may benefit from intervention strategies to improve
                                    efficiency.</p>
                                <p><strong>4. Not In Use Accounts:</strong> The 5% of 'Not In Use' accounts presents
                                    potential areas for deactivation or repurposing of resources.</p>
                                <p><strong>5. Low Consumption Accounts:</strong> With 10% categorized as 'Low
                                    Consumption,' consider ways to boost engagement and improve utilization.</p>
                                <p><strong>6. Others Category:</strong> The 'Others' segment (5%) includes various
                                    remarks and anomalies, requiring further analysis to identify specific trends and
                                    areas for improvement.</p>
                            </div>
                        </div>
                    </td>

                    <td>
                        <!-- Pie Chart Placeholder -->
                        <div id="chart_div"
                            style="width: 800px; height: 800px; margin: 0 auto; padding: 20px; overflow: hidden; border-radius: 15px; background: #f8f9fa;">
                        </div>
                    </td>

                </tr>
                <!-- Reading Data -->
                <tr>
                    <td> <span id='colchart_before' style='width: 800px; height: 250px; display: inline-block'></span>
                    </td>
                    <td>

                        <span id='colchart_after' style='width: 800px; height: 250px; display: inline-block'></span>
                    </td>
                </tr>
                <tr>
                    <td> <span id='colchart_diff' style='width: 800px; height: 250px; display: inline-block'></span>
                    </td>
                    <td>
                        <span id='barchart_diff' style='width: 800px; height: 250px; display: inline-block'></span>
                    </td>

                </tr>
                <!-- Download Chart -->
                <tr>
                    <td colspan="2">
                        <div id="columnchart_material"
                            style="width: 1500px; height: 500px; margin: 0 auto; padding: 20px; overflow: hidden; border-radius: 15px; background: #f8f9fa;">
                        </div>
                    </td>

                </tr>
            </table>


        </div>
        <script type="text/javascript">
            google.charts.load('current', { packages: ['corechart'] });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var rawData = [
                    ['CATEGORY', 'Count'],
                    ['RES', 11],
                    ['COM A', 2],
                    ['COM B', 2],
                    ['COM IND', 2],
                    ['GOV', 7]
                ];

                // Convert rawData into DataTable for Google Charts
                var data = google.visualization.arrayToDataTable(rawData);

                // Calculate total count
                var total = rawData.slice(1).reduce((sum, row) => sum + row[1], 0);

                // Options for the Pie Chart
                var options = {
                    title: 'Billing By Category',
                    titleTextStyle: {
                        fontSize: 20,
                        bold: true,
                        color: '#555'
                    },
                    is3D: true,
                    pieHole: 0.3,
                    slices: {
                        0: { color: '#004085' },
                        1: { color: '#1E90FF' },
                        2: { color: '#FFB400' },
                        3: { color: '#FF4500' },
                        4: { color: '#32CD32' }
                    },
                    chartArea: {
                        width: '90%',
                        height: '80%'
                    }
                };

                // Draw the Pie Chart
                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);

                // Store percentage data in corresponding HTML elements
                const categories = ['res', 'com_a', 'com_b', 'com_ind', 'gov'];
                rawData.slice(1).forEach((row, index) => {
                    const percentage = ((row[1] / total) * 100).toFixed(2); // Calculate percentage
                    document.getElementById(`${categories[index]}_percentage`).innerText = `${percentage}%`;
                });
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', { packages: ['corechart'] });
            google.charts.setOnLoadCallback(drawVisualization);

            function drawVisualization() {
                // Raw data
                var rawData = [
                    ['Day', 'High Cons', 'Closed', 'Below Ave', 'Not In Use', 'Low Cons', 'Others'],
                    ['2024/07/05', 65, 38, 52, 9, 45, 61],
                    ['2024/07/06', 35, 11, 59, 12, 28, 68],
                    ['2024/07/07', 57, 11, 58, 80, 39, 62],
                    ['2024/07/08', 39, 11, 61, 96, 21, 60],
                    ['2024/07/09', 36, 69, 62, 10, 36, 56]
                ];

                // Convert raw data into DataTable for visualization
                var data = google.visualization.arrayToDataTable(rawData);

                // Calculate totals for each category
                const categorySums = [0, 0, 0, 0, 0, 0]; // Initialize sums for each category
                const totalRows = rawData.length - 1; // Exclude the header row
                for (let i = 1; i <= totalRows; i++) {
                    for (let j = 1; j <= 6; j++) {
                        categorySums[j - 1] += rawData[i][j];
                    }
                }

                // Calculate total sum across all categories
                const totalSum = categorySums.reduce((sum, value) => sum + value, 0);

                // Calculate percentages and update corresponding HTML elements
                const categoryIds = [
                    'high_consumption_percentage',
                    'closed_percentage',
                    'below_average_percentage',
                    'not_in_use_percentage',
                    'low_consumption_percentage',
                    'others_percentage'
                ];

                categorySums.forEach((sum, index) => {
                    const percentage = ((sum / totalSum) * 100).toFixed(2);
                    document.getElementById(categoryIds[index]).innerText = `${percentage}%`;
                });

                // Chart options
                var options = {
                    title: 'Monthly Reading by Remarks',
                    vAxis: { title: 'Remarks' },
                    hAxis: { title: 'Day' },
                    seriesType: 'bars',
                    series: { 5: { type: 'line' } }
                };

                // Draw the ComboChart
                var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', { packages: ['corechart'] });
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var oldData = google.visualization.arrayToDataTable([
                    ['Date', 'Reading Data'],
                    ['2024/07/03', 250],
                    ['2024/07/04', 4200],
                    ['2024/07/05', 2900],
                    ['2024/07/06', 8200]
                ]);

                var newData = google.visualization.arrayToDataTable([
                    ['Date', 'Reading Data'],
                    ['2024/07/03', 370],
                    ['2024/07/04', 600],
                    ['2024/07/05', 700],
                    ['2024/07/06', 1500]
                ]);

                var colChartBefore = new google.visualization.ColumnChart(document.getElementById('colchart_before'));
                var colChartAfter = new google.visualization.ColumnChart(document.getElementById('colchart_after'));
                var colChartDiff = new google.visualization.ColumnChart(document.getElementById('colchart_diff'));
                var barChartDiff = new google.visualization.BarChart(document.getElementById('barchart_diff'));

                var options = { legend: { position: 'top' } };

                colChartBefore.draw(oldData, options);
                colChartAfter.draw(newData, options);

                var diffData = colChartDiff.computeDiff(oldData, newData);
                colChartDiff.draw(diffData, options);
                barChartDiff.draw(diffData, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', { 'packages': ['bar'] });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['DAY', 'Download', 'Upload', 'Remaining'],
                    ['2024/07/03', 1000, 400, 200],
                    ['2024/07/04', 1170, 460, 250],
                    ['2024/07/05', 660, 1120, 300],
                    ['2024/07/06', 1030, 540, 350]
                ]);

                var options = {
                    chart: {
                        title: '',
                        subtitle: 'Download, Upload and Remaining: July 2024',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
    </body>