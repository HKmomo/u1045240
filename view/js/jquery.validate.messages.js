/*
 * Translated default messages for the jQuery validation plugin.
 * Language: CN
 * Author: Fayland Lam <fayland at gmail dot com>
 */
jQuery.extend(jQuery.validator.messages, {
	required: "&nbsp;&nbsp;<span style=\"color:red\">必填</span>",
	remote: "請修正該字段",
	email: "&nbsp;&nbsp;<span style=\"color:red\">請輸入正確格式的電子郵件</span>",
	url: "請輸入合法的網址",
	date: "請輸入合法的日期",
	dateISO: "請輸入合法的日期 (ISO).",
	number: "&nbsp;&nbsp;<span style=\"color:red\">請輸入合法的數字</span>",
	digits: "&nbsp;&nbsp;<span style=\"color:red\">只能輸入整數</span>",
	creditcard: "請輸入合法的信用卡號",
	equalTo: "請再次輸入相同的值",
	accept: "請輸入擁有合法後綴名的字符串",
	maxlength: jQuery.format("請輸入一個長度最多是 {0} 的字符串"),
	minlength: jQuery.format("請輸入一個長度最少是 {0} 的字符串"),
	rangelength: jQuery.format("請輸入一個長度介於 {0} 和 {1} 之間的字符串"),
	range: jQuery.format("請輸入一個介於 {0} 和 {1} 之間的值"),
	max: jQuery.format("請輸入一個最大為 {0} 的值"),
	min: jQuery.format("請輸入一個最小為 {0} 的值")
});