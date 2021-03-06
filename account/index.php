<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
    {
        header('Location: http://situla.net/login?alert');
    }
    else if(isset($_GET['p']))
    {
        $page = $_GET['p'];
        if($page == 'logout')
        {
            session_destroy();
            header('Location: http://situla.net/');
        }
    }
    include('../heart.php');
    echoHeader(0, "Account");

    if(isset($_GET['clear']))
    {
        
    }
?>
    <div class="container">
      <div class="well well-small">
        <center>
	   <a href="gravatar.php"><img src="<?php echo $_SESSION['gravatar']; ?>?s=100"></a>
          <br><br>
	   <a class="btn btn-danger" href="?p=logout"><i class="icon-off icon-white"></i> Log out</a>
        </center>
      </div>
      <div class="well"
      <div class="tabbable">
        <ul class="nav nav-tabs">
<?php
    if($_GET['p'] == 'alerts')
    {
       echo 
        '
          <li><a href="#t1" data-toggle="tab">Projects</a></li>
          <li class="active"><a href="#t2" data-toggle="tab">Alerts</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="t1">
        ';
    }
    else
    {
        echo 
        '
          <li class="active"><a href="#t1" data-toggle="tab">Projects</a></li>
          <li><a href="#t2" data-toggle="tab">Alerts</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="t1">
        ';
    }

    $user = $_SESSION['username'];
    include('../config.php');
    if($result = $conn->query('SELECT project, id FROM situla.projects WHERE user=\''.$user.'\''))
    {
        while($row = $result->fetch_assoc())
        {
            echo '<a href="http://situla.net/projects/?project='.$row['id'].'"><b>'.$row['project'].'</b></a>';
            echo '<br><br>';
        }
    }
    if($_GET['p'] == 'alerts')
    {
        echo 
        '
          </div>
          <div class="tab-pane active" id="t2">
            <table class="table table-bordered table-hover">
              <tbody>
        ';
    }
    else
    {
        echo 
        '
          </div>
          <div class="tab-pane" id="t2">
            <table class="table table-bordered table-hover">
              <tbody>
        ';
    }
    
    if($result = $conn->query('SELECT text, id FROM situla.alerts WHERE user=\''.$user.'\' ORDER BY id DESC LIMIT 0, 10'))
    {
        while($row = $result->fetch_assoc())
        {
            echo '<tr><td>'.$row['text'].'</td><td><a class="btn btn-success btn-small" href="?clear='.$row['id'].'&p=alerts" title="Read"><i class="icon-ok-circle icon-white"></i></a></td></tr>';;
        }
    } 
    echo
    '
             </tbody>
           </table>
    ';
    echo '<b>Buttons NYI.</b>';
    $_SESSION['alerts'] = 0;
?>
          </div>
        </div>
      </div>
<?php
    echoFooter(false);
?>
