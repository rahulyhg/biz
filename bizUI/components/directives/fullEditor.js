String.prototype.startWith = function (str) {
    var reg = new RegExp("^" + str);
    return reg.test(this);
}

String.prototype.endWith = function (str) {
    var reg = new RegExp(str + "$");
    return reg.test(this);
}

angular.module('fullEditor', []).directive('fullEditor', function () {
    return {
        // require: "^fullEditor",
        restrict: 'EA',
        replace: true,
        scope: false,
        // scope: true,
        require: "ngModel",
        // {
        // otherModelValue: "=matchTo"
        // userList:['haisa000']
        // },
        template: "<div><div><div contenteditable='true' ng-model='editorContent' class=' form-control editor_content  fullComment' required></div></div><div><div class='search_result'><div class='display_box' align='left' ng-repeat='user in userList' ng-click='tagUser(user)'><a class='addname' >{{user.firstName}} - ({{user.email}})</a></div></dv></div></div>",
        link: function (scope, element, attributes, ngModel) {
            scope.tagUsers = [];
            var start = /@/ig; // @ Match
            var word = /@(\w+)/ig; //@abc Match

            var contentControl = element.find(".editor_content");
            var msgbox = element.find(".search_result");
            msgbox.hide();
            var startTag = false;

            function read() {
                ngModel.$setViewValue(contentControl.html());
            }


            ngModel.$render = function () {
                contentControl.html(ngModel.$viewValue || "");
            };

            contentControl.bind("blur keyup change", function () {
                scope.$apply(read);
                findUser();
            });

            function findUser() {
                var tagLinks = contentControl.find('.tagUser');
                var realTagUsers = [];

                var existedLinkUserIds = [];
                tagLinks.each(function (index, item) {
                    var tagUserId = $(item).attr("tagUserId");
                    existedLinkUserIds.push(tagUserId);

                });
                for (var i = 0; i < scope.tagUsers.length; i++) {
                    for (var j = 0; j < existedLinkUserIds.length; j++) {
                        if (scope.tagUsers[i].userId == existedLinkUserIds[j]) {
                            realTagUsers.push(scope.tagUsers[i]);
                        }

                    }


                }
                scope.appreciation.tagUsers = realTagUsers;
                scope.$apply();
                // $parent.tagUsers=scope.tagUsers;
            }



            contentControl.keyup(function (e) {
                $(this).focus();
            });

            contentControl.keyup(function (e) {
                msgbox.hide();


                var content = $(this).text(); //Content Box Data

                if (content && content.endWith('@')) {
                    //start @;
                    startTag = true;
                }
                if (!startTag) {
                    return false;
                }

                var go = content.match(start); //Content Matching @
                var name = content.match(word); //Content Matching @abc
                // var dataString = 'searchword=' + name;

                if (content.endWith(' ') || content.endWith('\u00A0')) {
                    return false;
                }
                //If @ available
                if (go && go.length > 0) {

                    if (name && name.length > 0) {
                        // $("#search_result").html(data).show();
                        // if (content.indexOf("\u00A0") >= 0) {
                        //     msgbox.hide();
                        //     return;
                        // }
                        if (content && content.endWith('@')) {
                            return;
                        }
                        if (go.length > name.length) {
                            return;
                        }


                        setTimeout(function () {
                            msgbox.show();
                        });

                        var text = name[name.length - 1];
                        text = text.replace('@', '');
                        scope.getUser(text, function (result) {
                            scope.userList = result;
                            //   scope.$apply();
                        });

                        // scope.userList = ['haisa', 'pan'];
                        scope.$apply();
                        // msgbox.show();

                    }
                }
                // return false;
                contentControl.focus();
            });

            scope.tagUser = function (user) {

                //var username=$(this).attr('title');


                var old = contentControl.html();
                var name = old.match(word);
                var content = "";
                if (old.endWith('@')) {
                    content = old.substr(0, old.length - 2);
                }
                else {
                    if (name && name.length > 1) {
                        var lastConent = name[name.length - 1];
                        content = old.replace(lastConent, "");
                    } else {
                        content = old.replace(word, "", "$'");
                    }
                }

                contentControl.html(content);


                var E = "<a class='red tagUser' contenteditable='false' tagUserId='" + user.userId + "'>@" + user.firstName + "</a> ";
                contentControl.append(E);
                msgbox.hide();
                contentControl.focus();
                placeCaretAtEnd(contentControl[0]);
                contentControl.focus();
                startTag = false;

                scope.tagUsers = scope.tagUsers || [];
                scope.tagUsers.push(user);
                read();
                return;
                scope.$apply(read);
            };



            function placeCaretAtEnd(el) {
                el.focus();
                if (typeof window.getSelection != "undefined"
                    && typeof document.createRange != "undefined") {
                    var range = document.createRange();
                    range.selectNodeContents(el);
                    range.collapse(false);
                    var sel = window.getSelection();
                    sel.removeAllRanges();
                    sel.addRange(range);
                } else if (typeof document.body.createTextRange != "undefined") {
                    var textRange = document.body.createTextRange();
                    textRange.moveToElementText(el);
                    textRange.collapse(false);
                    textRange.select();
                }
            }



        }
    };
});
