define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "<div class=\"content-container\">\n\n  <p class=\"average\">\n   El promedio en los Estados Unidos es de<br><br>\n    <span class=\"average-group\">\n    <span class=\"average-value\">1,870</span>\n    <span class=\"mobile-units\">galones de agua por día</span>\n    <span class=\"units\">galones de agua por día</span>\n    </span>\n  </p>\n\n  <p class=\"rating\">\n    <span class=\"rating-value\">";
  if (stack1 = helpers.rating) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = (depth0 && depth0.rating); stack1 = typeof stack1 === functionType ? stack1.call(depth0, {hash:{},data:data}) : stack1; }
  buffer += escapeExpression(stack1)
    + " <div class=\"rating-value\" id=\"twitter\"><a href='#'>Comparta su huella hídrica en Twitter</a>.</div></span>\n  </p>\n\n</div>\n\n<div class=\"content-footer\">\n\n  <div id=\"score-details\" class=\"pill-button balloon\">\n    \n    <span>CONOZCA SU HUELLA HÍDRICA A DETALLE.<br>PRUEBE CON DIFERENTES RESPUESTAS Y VEA SI SUS RESULTADOS CAMBIAN.</span>\n    <span class=\"tri shadow\"></span>\n    <span class=\"tri\"></span>\n    \n  </div>\n\n</div>\n";
  return buffer;
  });});