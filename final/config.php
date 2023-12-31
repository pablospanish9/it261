<?php  

ob_start(); // prevents header errors before reading the whole page!
// lines 5 to 22 below is from the Week 8 People config:
define('DEBUG', 'TRUE');  // We want to see our errors

include_once('credentials.php');

$errors = array();

$success = 'You have successfully logged on!';

ini_set('display_errors', 1);
error_reporting(E_ALL);


function myError($myFile, $myLine, $errorMsg)
{
if(defined('DEBUG') && DEBUG)
{
 echo 'Error in file: <b> '.$myFile.' </b> on line: <b> '.$myLine.' </b>';
      echo 'Error message: <b> '.$errorMsg.'</b>';
      die();
  }  else {
      echo ' Houston, we have a problem!';
      die();
  }
}


define('THIS_PAGE', basename($_SERVER['PHP_SELF'])); 

switch (THIS_PAGE) {
    case 'index.php':
        $title = 'Home page of our Website Project';
        $body = 'Home';
        break;

    case 'about.php':
        $title = 'About page of our Website Project';
        $body = 'about inner';
        break;

    case 'daily.php':
        $title = 'Daily page of our Website Project';
        $body = 'daily inner';
        break;

    case 'interpreters.php':
        $title = 'Interpreters page of our Website Project';
        $body = 'interpreters inner';
        break;

        case 'interpreters-view.php':
            $title = 'Interpreters-view page of our Website Project';
            $body = 'interpreters-view inner';
            break;
    

    case 'contact.php':
        $title = 'Contact page of our Website Project';
        $body = 'contact inner';
        break;

    case 'gallery.php':
        $title = 'Gallery page of our Website Project';
        $body = 'gallery inner';
        break;

        case 'thx.php':
            $title = 'Thank you';
            $body = 'Thanks inner';
            break;
}
// our navigation array

// // below is the code given at the beginning of quarter
$nav = array (
    'index.php' => 'Home',
    'about.php' => 'About',
    'daily.php' => 'Daily',
    'interpreters.php' => 'Project',
  'contact.php' => 'Contact',
    // 'gallery.php' => 'Gallery'
);

// here is a newer version of this section
// $nav['index.php'] = 'Home';
// $nav['about.php'] = 'About';
// $nav['daily.php'] = 'Daily'; 
// $nav['project.php'] = 'Project'; 
// $nav['contact.php'] = 'Contact'; 
// $nav['gallery.php'] = 'Gallery'; 

// here is the beginning of the make_links function from the functions page:
function make_links($nav) {
    $myreturn = '';
    foreach ($nav as $key => $value) {
        if (THIS_PAGE == $key) {
            $myreturn .= '<li><a class="current" href="'.$key.'">'.$value.'</a></li>';
        } else {
            $myreturn .= '<li><a href="'.$key.'">'.$value.'</a></li>';
        }
    } // end foreach function
    return $myreturn;

    // Call the function and echo its result to display the navigation   
        
    } // end make_links function



// this is the beginning of the switch for homework 3
  if (isset($_GET['today'])) {
      $today = $_GET['today'];
  } else {
      $today = date('l');
  }
// rotating content based on the day of the week
switch($today) {
    case 'Sunday':
        $movie = '<h3>Sunday is Interpretation Day</h3>';
        $pic = 'interpreting.jpg';
        $alt = 'An interpreter at work';
        $color = '#f2d0e8'; 
        $content = 'Interpretation is the art of converting spoken words from one language to another in real-time, either simultaneously or consecutively. It is an important service in various settings like international conferences, legal proceedings, and medical consultations. Interpreters need to quickly and accurately convey not only the meaning but also cultural nuances, ensuring effective communication across different languages.';
        break;
    case 'Monday':
        $movie = '<h3>Monday is Translation Day</h3>';
        $pic = 'translation.jpg';
        $alt = 'Text being translated';
        $color = '#c8ded1'; 
        $content = 'Translation involves the meticulous process of converting written text from one language to another. It is essential in creating multilingual documents, websites, and literature. A good translation maintains the original message’s tone, style, and context, making it understandable and relatable for the target audience.';
        break;
    case 'Tuesday':
        $movie = '<h3>Tuesday is Voiceover Day</h3>';
        $pic = 'voiceover.jpg';
        $alt = 'Voiceover recording';
        $color = '#f0adc0'; 
        $content = 'Voiceover is the process of adding a voice track to media like videos, television shows, and commercials. This service is vital for translating content into other languages, ensuring the message reaches a wider audience while maintaining the original tone and emotion of the performance.';
        break;
    case 'Wednesday':
        $movie = '<h3>Wednesday is Website Localization Day</h3>';
        $pic = 'localization.jpg';
        $alt = 'Website localization process';
        $color = '#ded5a9'; 
        $content = 'Website localization goes beyond simple translation. It involves adapting your website to different cultural and linguistic contexts, making it accessible and relevant to your target audience. This process requires knowledge of computer languages and includes adjusting text, fonts, colors, and layout to align with the cultural nuances of the target language.';
        break;
    case 'Thursday':
        $movie = '<h3>Thursday is Transcription Day</h3>';
        $pic = 'transcription.jpg';
        $alt = 'Audio transcription';
        $color = '#b8c0cc'; 
        $content = 'Transcription involves converting spoken language into written text, a crucial service in the legal, medical, and business sectors. It serves as the initial step in making audio and video content accessible to a wider audience. Typically, transcription is followed by translation to meet legal requirements and by voiceover for media purposes.';
        break;
    case 'Friday':
        $movie = '<h3>Friday is Subtitling Day</h3>';
        $pic = 'subtitling.jpg';
        $alt = 'Subtitling a film';
        $color = '#cce0db'; 
        $content = 'Subtitling is the process of providing written text on-screen to translate spoken dialogue in videos and movies. It is essential for making content like foreign films, TV shows, and online videos accessible to those who do not speak the original language, as well as for viewers with hearing impairments.';
        break;
    case 'Saturday':
        $movie = '<h3>Saturday is Consulting and Training Day</h3>';
        $pic = 'consulting_training.jpg';
        $alt = 'Language consulting and training session';
        $color = '#dbd0f2'; 
        $content = 'Consulting and training in the language industry encompass a broad range of services. They include cultural competency training, language learning for business or personal purposes, and advising organizations on how to effectively communicate in multilingual and multicultural settings.';
        break;
}


// my form's PHP



// Start of code to call hero pictures for index page

$photos [0] = 'fishes';
$photos [1] = 'flowers';
$photos [2] = 'lake';
$photos [3] = 'sunset';
$photos [4] = 'zion';

// the code below calls a random image:
// $i = rand(0, 4);
// $selected_image = ''.$photos[$i].'.jpg';
// echo '<img src="./images/'.$selected_image.'" alt="'.$photos[$i].'">';

// echo '<h2>We are going create a function</h2>';

function random_images($photos){
$my_return = '';
$i = rand(0, 4);
$selected_image = ''.$photos[$i].'.jpg';
$my_return = '<img src="./images/'.$selected_image.'" alt="'.$photos[$i].'">';
return $my_return;
}// end function
// the code below calls the random images:
// echo random_images($photos);



// the code below is the php that corresponds to the Contact page, taken from the Form 5 week 7 page:

// <?php

ob_start();

$first_name = '';
$last_name = '';
$email = '';
$services = '';
$phone = '';
$regions = '';
$events = '';
$comments = '';
$privacy = '';

// Initialize the error messages
$first_name_err = '';
$last_name_err = '';
$email_err = '';
$services_err = '';
$phone_err = '';
$regions_err = '';
$events_err = '';
$comments_err = '';
$privacy_err = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
// if input are empty, we will declare a statement else we will assign the $_POSTS to a variable
// $services = $_POST['services']

if(empty($_POST['services'])) {
// say something or do something
$services_err = 'What... no services?';
} else {
    $services = $_POST['services'];
}

if(empty($_POST['first_name'])) {
    // say something or do something
    $first_name_err = 'Please fill in your first name';
    } else {
    $first_name = $_POST['first_name'];
}

if(empty($_POST['last_name'])) {
    $last_name_err = 'Please fill in your last name';
    } else {
    $last_name = $_POST['last_name'];
}

if(empty($_POST['email'])) {
    $email_err = 'Please fill in your email';
    } else {
    $email = $_POST['email'];
}

if(empty($_POST['events'])) {
    $events_err = 'Please fill in your events';
    } else {
    $events = $_POST['events'];
}

if(empty($_POST['services'])) {
    $services_err = 'Please fill in your services';
    } else {
    $services = $_POST['services'];
}

// below is the old check for phone err message:
// if(empty($_POST['phone'])) {
//     $phone_err = 'Please fill in your phone number';
//     } else {
//     $phone = $_POST['phone'];
// }

// the code below checks for phone format:
if(empty($_POST['phone'])) { // if empty, type in your number
    $phone_err = 'Your phone number please!';
    } elseif(array_key_exists('phone', $_POST)){
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
    { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
    $phone_err = 'Invalid format!';
    } else{
    $phone = $_POST['phone'];
    } // end else
    } // end main if


if(empty($_POST['comments'])) {
    $comments_err = 'We value your input';
    } else {
    $comments = $_POST['comments'];
}



if(!isset($_POST['privacy']) || $_POST['privacy'] != 'yes') {
    $privacy_err = 'You must agree to our privacy policy'; 
} else {
    $privacy = $_POST['privacy'];
}

if(empty($_POST['regions']))  { 
    $regions_err = 'Please choose your region';
} else {
    $regions = $_POST['regions'];
}


// function
function my_services($services) {
$my_return='';
if(!empty($_POST['services'])){
    $my_return = implode(',' , $_POST['services']);
}
return $my_return;
} //end my_services function

// Check that all fields are filled out before sending the email
if(isset($_POST['first_name'],
$_POST['last_name'],
$_POST['email'],
$_POST['events'],
$_POST['phone'],
$_POST['services'],
$_POST['regions'],
$_POST['comments'],
$_POST['privacy'])){

// email sending
$to = 'szemeo@mystudentswa.com, pablosep@msn.com'; 
$subject = 'Test email on '.date('m/d/y, h:i A');
$body = 'Last Name: ' . $last_name . PHP_EOL .
        'First Name: ' . $first_name . PHP_EOL .
        'Email: ' . $email . PHP_EOL .
        'events: ' . $events . PHP_EOL .
        'Phone: ' . $phone . PHP_EOL .
        'services: ' . my_services($services) . PHP_EOL .
        'Regions: ' . $regions . PHP_EOL .
        'Comments: ' . $comments . PHP_EOL;

$headers = "From: noreply@mystudentswa.com";



// we will be adding an if statement - that this email form will only work if all the fields are filled out!!!

if (!empty($first_name) &&
    !empty($last_name) &&
    !empty($email) &&
    !empty($services) && 
    !empty($phone) &&
    !empty($regions) &&
    !empty($events) &&
    !empty($comments) &&
    !empty($privacy) &&
    preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))  {

        mail($to, $subject, $body, $headers);
        header('Location:thx.php');
    }
// we must upload the form to a server to receive an email.

} // end isset

} //CLOSING SERVER REQUEST METHOD



$people['Ludwig_Beethoven'] = 'beeth_Deaf composer and pianist from Germany.';
$people['Wolfgang_Mozart'] = 'mozar_Classical composer from Austria.';
$people['Ella_Fitzgerald'] = 'fitzg_Jazz singer from USA.';
$people['Miles_Davis'] = 'davis_Jazz trumpeter from IL, USA.';
$people['Madonna_Ciccone'] = 'madon_Pop singer and actress from MI, USA';
$people['Freddie_Mercury'] = 'mercu_Lead vocalist of music group Queen from UK.';

