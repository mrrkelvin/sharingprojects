<?php if(!($this->session->userdata('user_role') == 'admin') && !($this->session->userdata('user_role') == 'supervisor') && !($this->session->userdata('user_role') == 'student')){
        $this->session->set_flashdata('Not_auth','Your are now loggout');
        redirect('users/logout');
      }
      ?>
      <div class="page-header">
        <h2><?= $title ?></h2>
        <h3>Project Title:<?php echo $project['title']; ?></h3> 
      </div>
      <div align="center">
        
        
        <label style="text-align: center;">
Numbers of Ratings <br />(1-very poor, 2-poor, 3-neutral, 4-good, 5-very good)
    <canvas style="height:300px;" id="videoRatingChart"></canvas>
</label>              
          
      </div>
      <div align="center">
      <hr>
              <label style="text-align: center;">
Numbers of people who want to purchase to this project <br />
    <canvas style="height:300px;" id="interestedChart"></canvas>
</label>  
        

      </div>

        <script>
          let myChart = document.getElementById('videoRatingChart').getContext('2d');
          let chart = new Chart(myChart, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ["Design", "Video", "Audio", "Storyline", "Creativity"],
                datasets: [{
                    label: "1",
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: '#777',
                    data: [<?php echo $designrating1; ?>, <?php echo $videorating1; ?>, <?php echo $audiorating1; ?>, <?php echo $storylinerating1; ?>, <?php echo $creativityrating1; ?>],
                },{
                    label: "2",
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: '#777',
                    data: [<?php echo $designrating2; ?>, <?php echo $videorating2; ?>, <?php echo $audiorating2; ?>, <?php echo $storylinerating2; ?>, <?php echo $creativityrating2; ?>],
                },{
                    label: "3",
                    backgroundColor: 'rgba(255, 206, 86, 0.6)',
                    borderColor: '#777',
                    data: [<?php echo $designrating3; ?>, <?php echo $videorating3; ?>, <?php echo $audiorating3; ?>, <?php echo $storylinerating3; ?>, <?php echo $creativityrating3; ?>],
                },
                {
                    label: "4",
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: '#777',
                    data: [<?php echo $designrating4; ?>, <?php echo $videorating4; ?>, <?php echo $audiorating4; ?>, <?php echo $storylinerating4; ?>, <?php echo $creativityrating4; ?>],
                },
                {
                    label: "5",
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                    borderColor: '#777',
                    data: [<?php echo $designrating5; ?>, <?php echo $videorating5; ?>, <?php echo $audiorating5; ?>, <?php echo $storylinerating5; ?>, <?php echo $creativityrating5; ?>],
                }]
            },

            // Configuration options go here
            options: {
              title:{
                display:false,
                text:'Ratings (1-very poor,2-poor,3-neutral,4-good,5-very good)',
              },
            }
        });


          let myChart2 = document.getElementById('interestedChart').getContext('2d');
          let chart2 = new Chart(myChart2, {
            // The type of chart we want to create
            type: 'pie',

            // The data for our dataset
            data: {
                labels: ["Yes", "No"],
                datasets: [{
                    backgroundColor: ['rgba(153, 102, 255, 0.6)', 'rgba(75, 192, 192, 0.6)'],
                    data: [<?php echo $interestedyes ?>, <?php echo $interestedno; ?>],
                }]
            },

            // Configuration options go here
            options: {
              title:{
                display:false,
                text:'Numbers of people who want to purchase to this project',
              },
            }
        });
        </script>
         