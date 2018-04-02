/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    //引入编辑器
    UE.getEditor('content');
    //删除数据
    $(".delete").click(function () {
        var msg=$(this).attr("data-msg");
        if (confirm(msg)) {
            var id = $(this).attr("data-i");
            var url=$(this).attr("data-url");
            
            $.post(url, {"id": id}, function (data) {
                alert(data);
                window.location.href = 'index';
            })
        }

    })
})
