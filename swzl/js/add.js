function chkinput(form) {
	if(form.IsFound.value == "") {
		alert("请选类型!");
		return(false);
	}
	if(form.room.value == "") {
		alert("请选择教室!");
		return(false);
	}
	if(form.sth.value == "") {
		alert("请填写招领的物品!");
		form.sth.select();
		return(false);
	}
	if(form.sth.value.length > 10) {
		alert("输入的物品描述过长!");
		form.sth.select();
		return(false);
	}
	if(form.Contact.value == "") {
		alert("请填写联系方式!");
		form.Contact.select();
		return(false);
	}
	if(form.Contact.value.length < 6) {
		alert("输入的联系方式过短!");
		form.Contact.select();
		return(false);
	}
	if(form.Contact.value.length > 15) {
		alert("输入的联系方式过长!");
		form.Contact.select();
		return(false);
	}
	if(form.sno.value.length == "") {
		alert("学号姓名不能为空!");
		form.sno.select();
		return(false);
	}
	if(form.sname.value.length == "") {
		alert("学号姓名不能为空!");
		form.sname.select();
		return(false);
	}
	return(true);
}

function noticeUp(obj, top, time) {
	$(obj).animate({
		marginTop: top
	}, time, function() {
		$(this).css({
			marginTop: "0"
		}).find(":first").appendTo(this);
	})
}