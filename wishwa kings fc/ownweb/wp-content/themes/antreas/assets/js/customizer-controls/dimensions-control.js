(function (api, $) {

	api.AntreasDimensionsControl = api.Control.extend({

		ready: function () {

			var control = this,
				dimensions;

			control.logo = api.control('custom_logo');
			control.values = control.setting();
			dimensions = control.container.find('input');
			control.widthInput = dimensions.eq(0);
			control.heightInput = dimensions.eq(1);

			if (undefined !== control.logo.params.attachment) {
				control.hasLogo = true;
				control.logoWidth = control.logo.params.attachment.width;
				control.logoHeight = control.logo.params.attachment.height;
			} else {
				control.hasLogo = false;
				control.toggle(false);
			}

			control.logo.setting.bind('change', function () {
				control.updateLogo();
			});

			control.widthInput.on('change keyup', function () {
				if (control.hasLogo) {
					control.calculateRatio('width');
					control.interval = setInterval(control.updateControl, 500, control);
				}
			});

			control.heightInput.on('change keyup', function () {
				if (control.hasLogo) {
					control.calculateRatio('height');
					control.interval = setInterval(control.updateControl, 500, control);
				}
			});

		},

		updateLogo: function () {
			var control = this,
				values = control.setting();

			if (undefined !== control.logo.params.attachment) {

				control.logoWidth = control.logo.params.attachment.width;
				control.logoHeight = control.logo.params.attachment.height;

				if (!values) {
					values = {
						'width': control.logoWidth,
						'height': control.logoHeight,
					};
				} else {
					values.width = control.logoWidth;
					values.height = control.logoHeight;
				}

				control.widthInput.val(control.logoWidth);
				control.heightInput.val(control.logoHeight);

				control.setting({});
				control.setting(values);
				control.hasLogo = true;
				control.toggle(true);
			} else {
				control.hasLogo = false;
				control.toggle(false);
			}
		},

		calculateRatio: function (keep) {
			var control = this,
				aux;

			if ('width' === keep) {
				aux = control.logoHeight * control.widthInput.val() / control.logoWidth;
				control.heightInput.val(parseFloat(aux).toFixed(0));
			} else if ('height' === keep) {
				aux = control.logoWidth * control.heightInput.val() / control.logoHeight;
				control.widthInput.val(parseFloat(aux).toFixed(0));
			}

			clearInterval(control.interval);
		},

		updateControl: function (control) {
			var values = control.setting();

			if (!values) {
				values = {
					'width': control.widthInput.val(),
					'height': control.heightInput.val(),
				};
			} else {
				values.width = control.widthInput.val();
				values.height = control.heightInput.val();
			}
			control.setting({});
			control.setting(values);
			clearInterval(control.interval);
		}

	});

	// Extend epsilon button constructor
	$.extend(api.controlConstructor, {
		'antreas-dimensions-control': api.AntreasDimensionsControl
	});

})(wp.customize, jQuery);