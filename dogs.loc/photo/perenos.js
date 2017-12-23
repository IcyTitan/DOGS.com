$.fn.hyphenate = function() {
  var all = "[��������������������������������]",
    glas = "[��������\�]",
    sogl = "[��������������������]",
    zn = "[���]",
    shy = "\xAD",
    re = [];
   
  re[1] = new RegExp("("+zn+")("+all+all+")","ig");
  re[2] = new RegExp("("+glas+")("+glas+all+")","ig");
  re[3] = new RegExp("("+glas+sogl+")("+sogl+glas+")","ig");
  re[4] = new RegExp("("+sogl+glas+")("+sogl+glas+")","ig");
  re[5] = new RegExp("("+glas+sogl+")("+sogl+sogl+glas+")","ig");
  re[6] = new RegExp("("+glas+sogl+sogl+")("+sogl+sogl+glas+")","ig");
  return this.each(function() {
    var text = $(this).html();
    for (var i = 1; i < 7; ++i) {
      text = text.replace(re[i], "$1"+shy+"$2");
    }
    $(this).html(text);
  });
};