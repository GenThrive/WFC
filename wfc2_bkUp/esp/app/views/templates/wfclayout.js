define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "<div id=\"lightbox\" class='feedback'></div>\n    <div id=\"feedback_div\">\n        <h1>Send Feedback</h1>\n        <input type=\"text\" id=\"feedback_email\" placeholder=\"Email Optional\" />\n        <textarea id=\"feedback_text\" maxlength=\"1000\" placeholder=\"Leave Your Feedback\"></textarea>\n        <button class=\"pill-button send_feedback\" >Submit</button> <span id=\"key_count\">1000</span>\n    </div>\n    <div id=\"lightbox\" class=\"email\"></div></div>    \n<div id=\"score\"></div>\n<div id=\"header\"></div>\n<div id=\"content\"></div>\n<div id=\"report\"></div>\n<div id=\"footer\"></div>\n<div id=\"progress\"></div>\n";
  });});