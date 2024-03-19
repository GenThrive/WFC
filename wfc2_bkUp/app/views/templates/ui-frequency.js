define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "<div class=\"ui-spinner rate\">\n  <div class=\"ui-spinner-control minus\"><span class=\"icon icon-minus\"></span></div>\n  <div class=\"ui-spinner-display\"></div>\n  <div class=\"ui-spinner-control plus\"><span class=\"icon icon-plus\"></span></div>\n</div>\n\n<div class=\"descriptor\">";
  if (stack1 = helpers.descriptor) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = (depth0 && depth0.descriptor); stack1 = typeof stack1 === functionType ? stack1.call(depth0, {hash:{},data:data}) : stack1; }
  buffer += escapeExpression(stack1)
    + "</div>\n\n<div class=\"ui-spinner frequency\">\n  <div class=\"ui-spinner-control minus\"><span class=\"icon icon-minus\"></span></div>\n  <div class=\"ui-spinner-display\"></div>\n  <div class=\"ui-spinner-control plus\"><span class=\"icon icon-plus\"></span></div>\n</div>\n";
  return buffer;
  });});