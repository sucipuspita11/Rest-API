<?php
function get_CURL($url)
{

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCysWzX3yksEex2u7QyU5Cqg&key=AIzaSyDTVaf_yGhKmjJ-qOipC9cOvqgO7itLvSI');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

//Instagram API
$clientId='17841474796531734';
$accesToken='IGAARkSz5WjelBZAE1BY2EzcUdONzN2U3B2cVppVnhrSTdDMHp3ZAzRYYUVRTUctRFp0Vm9BelZAISURmQXFhVFI1UzcwSmlFMlB2Si0xVGpJdTlIb2VxU2FVSTc0SVRCY2xOdjJ3ek9BaEM4al8yUXp6TGhXYmpOeDhENWxfUDZAjSQZDZD';

$result2 = get_CURL("https://graph.instagram.com/v22.0/me?fields=username,profile_picture_url,followers_count&access_token=IGAARkSz5WjelBZAE1BY2EzcUdONzN2U3B2cVppVnhrSTdDMHp3ZAzRYYUVRTUctRFp0Vm9BelZAISURmQXFhVFI1UzcwSmlFMlB2Si0xVGpJdTlIb2VxU2FVSTc0SVRCY2xOdjJ3ek9BaEM4al8yUXp6TGhXYmpOeDhENWxfUDZAjSQZDZD");

$usernameIG = $result2['username'];
$profilePictureIG = $result2['profile_picture_url'];
$followersIG = $result2['followers_count'];

//latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyDTVaf_yGhKmjJ-qOipC9cOvqgO7itLvSI&channelId=UCysWzX3yksEex2u7QyU5Cqg&maxResults=1&order=date&part=snippet';
$result = get_CURL($urlLatestVideo);
$latestVideoId = $result['items'][0]['id']['videoId'];

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Suci Puspita Sari</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/WhatsApp.jpg" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Suci Puspita Sari</h1>
          <h3 class="lead">Student | Programmer | 2217020043</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Hello! I'm Suci Puspita Sari. I was born on December 11, 2004, and I'm from Pesisir Selatan, Indonesia. I'm the youngest of five siblings. Currently, I'm studying Information Systems at UIN Imam Bonjol Padang, and I'm in my sixth semester. I'm very interested in technology and always eager to learn new things in the world of information systems. Nice to meet you.</p>
          </div>
          <div class="col-md-5">
            <p> In my free time, I enjoy reading, exploring new software and technology, and watching educational or inspiring content online. I also love expressing my creativity through writing and simple graphic design. These hobbies not only help me relax but also support my passion for learning and growing in the field of information systems.</p>
          </div>
        </div>
      </div>
    </section>


    <!-- Sosial Media -->
     <section class="social bg-light" id="social">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Sosial Media</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="row mt-3 pb-3">
              <div class="col-md-4">
                <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $channelName;?></h5>
                <p><?= $subscriber;?> Subscriber.</p>
                <div class="g-ytsubscribe" data-channelid="UCysWzX3yksEex2u7QyU5Cqg" data-layout="default" data-count="default">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId;?>" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-4 ">
                <img src="<?=$profilePictureIG; ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                  <h5><?=$usernameIG ?></h5>
                  <p><?=$followersIG ?>Followers.</p>
              </div>
            </div>

            <div class="row mt-3 pb-3">
              <div class="col">
                <div class="ig-thumbnail">
                <img src="img/thumbs/1.png">
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </section>
  


    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/me.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/akulagi.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/WhatsApp.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/family.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/sister.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/forum.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Thank you for taking the time to learn more about me! If you have any questions, collaboration opportunities, or simply want to connect, feel free to reach out. I’m always open to new ideas, discussions, and opportunities to grow. Let’s stay in touch.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">Padang, Sumatra Barat</li>
              <li class="list-group-item">Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>