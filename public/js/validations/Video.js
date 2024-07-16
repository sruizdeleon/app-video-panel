$(document).ready(function () {


    $.validator.addMethod(
			"checkRegex",
			function (value, element, params) {
				if (Array.isArray(params)) {
					for (let param of params) {
						if (!param.regex.test(value)) {
							$.validator.messages.checkRegex = param.msg;
							return false;
						}
					}
					return true;
				} else {
					return this.optional(element) || params.regex.test(value);
				}
			},
			function () {
				return $.validator.messages.checkRegex;
			}
		);

    $.validator.addMethod(
      "positiveNumber",
      function (value, element) {
        return this.optional(element) || (/^\d+$/.test(value) && parseInt(value, 10) > 0);
      },
      "User_id must be a positive number, greater than 0."
    );

	$("#editVideoForm").validate({
		rules: {
			title: {
				required: true,
				minlength: 2,
				maxlength: 150,
				checkRegex: [
					{
						regex: /^[A-Za-z0-9-ñÑ ]+$/,
						msg: "Title must contain only letters, numbers, hyphens and spaces.",
					},
				],
			},
			url: {
				required: true,
				checkRegex: [
					{
						regex: /^(https?:\/\/www\.youtube\.com\/watch\?v=|https?:\/\/www\.youtube\.com\/embed\/).*$/,
						msg: "Youtube url must be in the format: www.youtube.com/watch?v=XXXXXXXXXXX or www.youtube.com/embed/XXXXXXXXXXX",
					},
					{
						regex:
							/^(https?:\/\/www\.youtube\.com\/watch\?v=|https?:\/\/www\.youtube\.com\/embed\/)[A-Za-z0-9]{10,12}$/,
						msg: "Youtube video reference must be 10 to 12 characters long and contain only letters and numbers.",
					},
				],
			},
			date: {
				required: true,
				date: true,
			},
			user_id: {
				required: true,
				positiveNumber: true,
			},
		},
		messages: {
			title: {
				required: "Please enter your title",
				minlength: "Title must be at least 2 characters",
				maxlength: "Title must be maximum 150 characters",
			},
			url: {
				required: "Please enter your youtube url",
			},
			date: {
				required: "Please enter your email",
				date: "Please enter a valid format date",
			},
			user_id: {
				required: "Please enter your user_id",
				positiveNumber: "User_id must be a positive number, greater than 0.",
			},
		},
	});

	$("#createVideoForm").validate({
		rules: {
			title: {
				required: true,
				minlength: 2,
				maxlength: 150,
				checkRegex: [
					{
						regex: /^[A-Za-z0-9-ñÑ ]+$/,
						msg: "Title must contain only letters, numbers, hyphens and spaces.",
					},
				],
			},
			url: {
				required: true,
				checkRegex: [
					{
						regex: /^(https?:\/\/www\.youtube\.com\/watch\?v=|https?:\/\/www\.youtube\.com\/embed\/).*$/,
						msg: "Youtube url must be in the format: www.youtube.com/watch?v=XXXXXXXXXXX or www.youtube.com/embed/XXXXXXXXXXX",
					},
					{
						regex:
							/^(https?:\/\/www\.youtube\.com\/watch\?v=|https?:\/\/www\.youtube\.com\/embed\/)[A-Za-z0-9]{10,12}$/,
						msg: "Youtube video reference must be 10 to 12 characters long and contain only letters and numbers.",
					},
				],
			},
			date: {
        required: true,
				date: true,
			},
			user_id: {
				required: true,
				positiveNumber: true,
			},
		},
		messages: {
			title: {
				required: "Please enter your title",
				minlength: "Title must be at least 2 characters",
				maxlength: "Title must be maximum 150 characters",
			},
			url: {
				required: "Please enter your youtube url",
			},
			date: {
				required: "Please enter your date",
				date: "Please enter a valid format date",
			},
			user_id: {
				required: "Please enter your user_id",
				positiveNumber: "User_id must be a positive number, greater than 0.",
			},
		},
	});

	$("#dashboardVideoForm").validate({
		rules: {
			title: {
				required: true,
				minlength: 2,
				maxlength: 150,
				checkRegex: [
					{
						regex: /^[A-Za-z0-9-ñÑ ]+$/,
						msg: "Title must contain only letters, numbers, hyphens and spaces.",
					},
				],
			},
			url: {
				required: true,
				checkRegex: [
					{
						regex: /^(https?:\/\/www\.youtube\.com\/watch\?v=|https?:\/\/www\.youtube\.com\/embed\/).*$/,
						msg: "Youtube url must be in the format: www.youtube.com/watch?v=XXXXXXXXXXX or www.youtube.com/embed/XXXXXXXXXXX",
					},
					{
						regex:
							/^(https?:\/\/www\.youtube\.com\/watch\?v=|https?:\/\/www\.youtube\.com\/embed\/)[A-Za-z0-9]{10,12}$/,
						msg: "Youtube video reference must be 10 to 12 characters long and contain only letters and numbers.",
					},
				],
			},
		},
		messages: {
			title: {
				required: "Please enter your title",
				minlength: "Title must be at least 2 characters",
				maxlength: "Title must be maximum 150 characters",
			},
			url: {
				required: "Please enter your youtube url",
			},
		},
	});



	});