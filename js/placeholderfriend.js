(function($) {
  //创建一个placeholderfriend
  var placeholderfriend = {
    focus: function(s) {
      s = $(s).hide().prev().show().focus();
      var idValue = s.attr("id");
      if (idValue) {
        s.attr("id", idValue.replace("placeholderfriend", ""));
      }
      var clsValue = s.attr("class");
	  if (clsValue) {
        s.attr("class", clsValue.replace("placeholderfriend", ""));
      }
    }
  }

  //判断是否支持placeholder
  function isPlaceholer() {
    var input = document.createElement('input');
    return "placeholder" in input;
  }
//alert(isPlaceholer());ie不支持
  //不支持的代码
  if (!isPlaceholer()) {
    $(function() {
      var form = $(this);
      //text类型
      var elements = form.find("input[type='text'][placeholder]");
      elements.each(function() {
        var s = $(this);
        //获得placeholder属性内容
        var pValue = s.attr("placeholder");
		var sValue = s.val();
        if (pValue) {
          if (sValue == '') {
            s.val(pValue);
          }
        }
      });
//获得焦点就将内容置空
      elements.focus(function() {
        var s = $(this);
        var pValue = s.attr("placeholder");
		var sValue = s.val();
        if (sValue && pValue) {
          if (sValue == pValue) {
            s.val('');
          }
        }
      });
//失去焦点就将内容恢复
      elements.blur(function() {
        var s = $(this);
        var pValue = s.attr("placeholder");
		var sValue = s.val();
        if (!sValue) {
          s.val(pValue);
        }
      });
//password类型
      var elementsPass = form.find("input[type='password'][placeholder]");
      elementsPass.each(function(i) {
        var s = $(this);
        var pValue = s.attr("placeholder");
		var sValue = s.val();
        if (pValue) {
          if (sValue == '') {
            var html = this.outerHTML || "";
            //找到type=password 被替换
            html = html.replace(/\s*type=(['"])?password\1/gi, " type=text placeholderfriend").replace(/\s*(?:value|on[a-z]+|name)(=(['"])?\S*\1)?/gi, " ").replace(/\s*placeholderfriend/, " placeholderfriend value='" + pValue + "' " + "onfocus='placeholderfriendfocus(this);' ");
            var idValue = s.attr("id");
            if (idValue) {
              s.attr("id", idValue + "placeholderfriend");
            }
            var clsValue = s.attr("class");
			if (clsValue) {
              s.attr("class", clsValue + "placeholderfriend");
            }
            s.hide();
            s.after(html);
          }
        }
      });

      elementsPass.blur(function() {
        var s = $(this);
        var sValue = s.val();
        if (sValue == '') {
          var idValue = s.attr("id");
          if (idValue) {
            s.attr("id", idValue + "placeholderfriend");
          }
          var clsValue = s.attr("class");
		  if (clsValue) {
            s.attr("class", clsValue + "placeholderfriend");
          }
          s.hide().next().show();
        }
      });

    });
  }
  window.placeholderfriendfocus = placeholderfriend.focus;
})(jQuery);