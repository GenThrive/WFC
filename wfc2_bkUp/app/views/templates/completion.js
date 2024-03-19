define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "<div class=\"content-container\">\n  \n  <p class=\"average\">\n   The US Average is\n    <span class=\"average-group\">\n    <span class=\"average-value\">1,870</span>\n    <span class=\"mobile-units\">Gallons/Day</span>\n    <span class=\"units\">Gallons/Day</span>\n    </span>\n  </p>\n\n  <p class=\"rating\">\n    <span class=\"rating-value\"><br/><br/>";
  if (stack1 = helpers.rating) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = (depth0 && depth0.rating); stack1 = typeof stack1 === functionType ? stack1.call(depth0, {hash:{},data:data}) : stack1; }
  buffer += escapeExpression(stack1)
    + " <div class=\"rating-value\" id=\"twitter\"><a href='#'>Share your water footprint on Twitter</a>.</div></span>\n  </p> \n\n</div>\n\n<div class=\"content-footer\">\n\n    <div id=\"report-footer--email\" class=\"top-email complete\">\n      <p class=\"justiy_p\">Get an email with your water footprint.</p>\n      <p class=\"justiy_p\">In three months we'll remind you <br> to come back and see if you've improved</p>\n      <div id=\"email-form\">\n        <input id=\"email-input1\" class=\"email-input\" type=\"email\" placeholder=\"Your Email Address\">\n        <div id=\"email-submit1\" class=\"email-submit pill-button\" >Submit</div>\n    </div>\n     <h2 id=\"email-confirmation\" class=\"hidden\">Thank you!</h2>\n    </div>\n\n  <div id=\"score-details\" class=\"pill-button balloon\">\n    \n    <span>SCROLL DOWN TO SEE YOUR WATER USE</span>\n    <span class=\"tri shadow\"></span>\n    <span class=\"tri\"></span>\n    \n  </div>\n\n</div>\n";
  return buffer;
  });});