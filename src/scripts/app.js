/*
    Author: ONANA vital
    Website: https://onanavital.github.io/cv/
*/

// Global variables
var body = document.querySelectorAll("body");
var nav = document.getElementById("left_nav");

// Status of WI-FI
function checkWifiStatus() 
{
    const connect = "WIFI";
    const disconnect = "No WIFI";

    // Conditions
    if (navigator.onLine) 
    {
        alert(connect);
    }
}

alert("hi")