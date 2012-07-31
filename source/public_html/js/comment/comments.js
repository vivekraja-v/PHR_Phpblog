jQuery.fn.delete_comment = function (id) {
    var that = $(this);
    that.hide(1, function () {
        that.parent().append('<div class="timer">It will be removed in <span class="countdown red">30</span> seconds · <a class="stop blue" href="#">Cancel</a></div>');
        timer = that.parent().find('.countdown');
        timer.show().countDown({
            startNumber: 30,
            startFontSize: '12px',
            endFontSize: '12px',
            callBack: function () {
                $.post("../../resources/templates/comment/ajax.php", {
                    remove: id
                }, function (data) {
                    if (data.status == 'done') {
                        that.parents('.comment').remove();
                    } else {
                        $('.stop').click();
                    }
                }, 'json');
            }
        });
    });
    $('.stop').live('click', function () {
        var parent = $(this).parent();
        parent.find('.countdown').stop();
        parent.prev().show(1, function () {
            parent.remove()
        });
        return false;
    });
};

jQuery.fn.add_comment = function (page_id) {
    var that = $(this);

    that.hide(10, function () {
        that.prev().show();
    });

    that.parent().find('input[type=submit]').click(function () {
        var value = $(this).prev().val();
        if (value.length < 3) {
            $(this).prev().addClass('error');
            return false;
        } else {
            var input = $(this);
            input.prev().attr('disabled', true);
            input.attr('disabled', true);
            $.post("../../resources/templates/comment/ajax.php", {
                page_id: page_id,
                comment: value
            }, function (data) {
                if (data.error) {
                    alert("Your Comment Can Not Be Posted");
                } else {
                    that.parent().prev('.comments').append('<div class="comment rounded5"><p class="left"><img class="avatar" src="' + data.avatar + '" /></p><p class="body right small">' + data.comment + '<br /><div class="details small"><span class="blue">' + data.time + '</span> · <a class="red" href="#" onclick="$(this).delete_comment(' + data.id + '); return false;">Remove</a></div></p></div>');
                    input.prev().val('');
                }
                input.prev().attr('disabled', false);
                input.attr('disabled', false);
            },'json');

        }
        return false;
    });
};