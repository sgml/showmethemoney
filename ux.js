function fullyloaded()
  {
  var i, elems;

  if(document.readyState === "complete")
    {
    elems = document.querySelectorAll("#fiats a");
    elems2 = document.querySelectorAll("span[id]"); 

    for(i=0; i < elems.length; i++)
      {  
      elems[i].addEventListener("click", change_rates, false);
      }

   for(i=0; i < elems2.length; i++)
      {  
      elems2[i].addEventListener("click", donate, false);
      }
    }
  else
    {
    document.onreadystatechange = fullyloaded;
    }
  }

function change_rates()
  {
  var event = arguments[0];
  var selection = String(event.target.attributes["href"].value).substr(2);
  var elems = document.querySelectorAll("span[id]");
  var price = Number(document.querySelector("#" + selection).value);
  var lang = "lang_";
  var sym = document.querySelector("#" + lang + selection).value;
  var space = "   ";
  var rate;
  var value; 
  var i;

    for(i=0; i < elems.length; i++)
      {  
      rate = Number(String(elems[i].id).substr(1));
      value = Number(rate * price).toPrecision(3);
      if (selection === "USD")
        {
        value = Number(value).toFixed();
        }
      elems[i].innerText = sym + value + space;
      elems[i].lang = selection;
      }
  
  return false;
  }

function donate()
  {
  var event = arguments[0];
  var subdir = "/donate/";
  var slash = "/";
  window.location.href = subdir + event.target.lang + slash + event.target.innerText;
  }

fullyloaded();
