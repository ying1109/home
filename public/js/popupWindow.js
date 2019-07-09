$.extend({  //一个参数的用于扩展jQuery类本身，也就是用来在jQuery类/命名空间上增加新函数，或者叫静态方法
	//弹窗控件
	popupWindow: function (options) {
		var _this = $('body');
		var defaults = { //初始属性
			  // "alert", "confirm", or "prompt"
  type: 'alert',

  // "hint", , "error", or "correct"
  icon: 'hint',

  // dialog title
  title: 'Title',

  // dialog content
  content: 'Dialog Content',

  // dialog width
  width: 540,

  // top offset
  top: 300,

  // cancel button
  cancelText: '取消',

  // confirm button
  confirmText: '确定',

  // transition speed in ms
  transition: 300,

  // callback
  onClosed: function (arg1, arg2) { }

		};
		options = $.extend(defaults, options);
		//数据初始化
		var dataInit = function () {
			$(".popTopIcon").css('background', 'url(/img/pic/' + options.icon + '.png)').css('background-size', '100% 100%');
			if (options.width < '300') { options.width = '300'; }
			$(".popBox").css('width', options.width + 'px').css('top', options.top + 'px');
			$(".popConfirm").text(options.confirmText);
			$(".popCancel").text(options.cancelText);
			$(".popBox").hide();
			$(".popBox:last").show(defaults.transition);
			if (options.type == 'prompt') {
				$(".popInput").focus();
			}
		}
		//按钮创建
		var contentCreate = function () {
			var txt = '';
			if (options.type == 'alert' || options.type == 'confirm') {
				txt = '<span class="popMidTxt">' + options.content + '</span>';
			} else if (options.type == 'prompt') {
				txt = '<input class="popInput"></input>';
			}
			return txt;
		}
		//按钮创建
		var buttonCreate = function () {
			var txt = '';
			if (options.type == 'alert') {
				txt = '<button class="popConfirm"></button>'
			} else if (options.type == 'confirm' || options.type == 'prompt') {
				txt = `<button class="popConfirm popButton"></button>
			           <button class="popCancel popButton"></button>`
			}
			return txt;
		}
		//创建窗口
		var createPopupWindow = function () {
			var popHtml = '';
			popHtml = `
		<div class="popAll">
			<div class="popMask"></div>
			<div class="popBox">
				<div class="popBoxContent">
					<div class="popConTop">
						<div class="popTopIcon"></div>
						<div class="popTopTitle">`+ options.title + `</div>
						<div class="popTopClose"></div>
					</div>
					<div class="popConMid">
						`+ contentCreate() + `
					</div>
					<div class="popConBot">
						`+ buttonCreate() + `
					</div>
				</div>
			</div>
		</div>
			`;
			_this.append(popHtml);
		}

		createPopupWindow();

		dataInit();

		//关闭窗口
		var closeWindow = function (callback) {
			$('.popBox').hide("slow");
			$('.popMask').css('display', 'none');
			callback();
		}
		$(".popTopClose").click(function () {
			closeWindow(function () {
				options.onClosed(false);
			});
		});
		$(".popCancel").click(function () {
			closeWindow(function () {
				options.onClosed(false);
			});
		});

		//确定点击事件
		$(".popConfirm").click(function (e) {
			var popInput = '';
			if (options.type == 'prompt') {
				popInput = $(".popInput:last").val();
			}
			closeWindow(function () {
				options.onClosed(true, popInput);
			});
		});

		var fn = {
		//aa

		}

		return fn; //返回提供的方法
	}
});
