function UUID() {
    var e = [];
    var t = "0123456789abcdef";
    for (var n = 0; n < 36; n++) {
        e[n] = t.substr(Math.floor(Math.random() * 16), 1)
    }
    e[14] = "4";
    e[19] = t.substr(e[19] & 3 | 8, 1);
    e[8] = e[13] = e[18] = e[23] = "-";
    var r = e.join("");
    return r
}
var $live_path = __live != "/" ? __live + "/" : __live;
var email_regex = /^(?:[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
if (!Modernizr) console && console.log("Primeiro carregar Modernizr.");
else {
    function createMapSelector(e, t, n, r, i, s) {
        var o = $("<div/>", {
            id: r + "-out"
        });
        var u = $("<input/>", {
            type: "text",
            name: e,
            value: t,
            "class": "map-selector",
            id: r,
            width: 292
        });
        var a = $("<div/>", {
            id: r + "-div",
            width: i || 700,
            height: s || 600
        });
        o.prepend(a);
        o.prepend("<br/><br/>");
        var f = t ? t.split(",") : [-32.05588089922793, -52.14042683105471];
        u.val(f[0] + ", " + f[1]);
        o.prepend(u);
        o.prepend("Centralize o mapa na localização desejada ou preencha o campo com as coordenadas.<br><br>");
        var l = $("<input/>", {
            type: "checkbox"
        });
        l.click(function () {
            $this = $(this);
            if ($this.is(":checked")) {
                $("#" + r + "-out").css("visibility", "visible");
                $("#" + r + "-out").css("position", "static");
                $("#" + r).val(h.getCenter().d + ", " + h.getCenter().e)
            } else {
                $("#" + r + "-out").css("visibility", "hidden");
                $("#" + r + "-out").css("position", "absolute");
                $("#" + r).val("")
            }
        });
        n.after(o);
        n.after("<span> Utilizar coordenadas do mapa</span>");
        n.after(l);
        var c = {
            zoom: 16,
            center: new google.maps.LatLng(f[0], f[1])
        };
        var h = new google.maps.Map(document.getElementById(r + "-div"), c);
        var p = new google.maps.Marker({
            position: h.getCenter(),
            map: h,
            title: "Centro do Mapa"
        });
        var d = false;
        google.maps.event.addListener(h, "center_changed", function () {
            if (!d) {
                p.setPosition(h.getCenter());
                d = true;
                u.val(h.getCenter().d + ", " + h.getCenter().e);
                d = false
            }
        });
        u.keyup(function () {
            if (!d) {
                d = true;
                var e = u.val().split(",");
                if (e.length < 2) e[1] = "0";
                var t = new google.maps.LatLng(e[0].trim() || 0, e[1].trim() || 0);
                h.panTo(t);
                p.setPosition(h.getCenter(t));
                d = false
            }
        });
        if (t) l.attr("checked", "checked");
        else {
            o.css("position", "absolute");
            o.css("visibility", "hidden");
            u.val("")
        }
        n.remove()
    }

    function processMaps() {
        $("map").each(function () {
            var e = $(this),
                t = e.attr("description"),
                n = e.attr("value"),
                r = UUID(),
                i = e.attr("width"),
                s = e.attr("height");
            if (typeof n === "undefined" || !n) n = null;
            if (n) var o = createMap($(this), n, t, r, i, s)
        })
    }

    function createMap(e, t, n, r, i, s) {
        if (!t) {
            e.remove();
            return
        }
        var o = $("<div/>", {
            width: i || 700,
            height: s || 600,
            id: r + "-div"
        });
        e.after(o);
        var u = t ? t.split(",") : [-32.05588089922793, -52.14042683105471];
        var a = {
            zoom: 16,
            center: new google.maps.LatLng(u[0], u[1])
        };
        var f = new google.maps.Map(document.getElementById(r + "-div"), a);
        var l = new google.maps.Marker({
            position: f.getCenter(),
            map: f,
            title: n || "Endereço"
        });
        google.maps.event.addListener(f, "center_changed", function () {
            window.setTimeout(function () {
                f.panTo(l.getPosition())
            }, 3e3)
        });
        e.remove()
    }

    function createImageUploader(e, t, n, r, i) {
        var s = $("<input/>", {
            type: "hidden",
            name: n ? e + "_arquivo[]" : e,
            value: t.arquivo,
            "class": "uploader-arquivo"
        });
        var o = $("<div/>", {
            "class": "uploader-item",
            name: e
        });
        var u = $("<img>", {
            src: t.arquivo
        });
        var a = $("<input>", {
            maxlength: "100",
            value: t.titulo,
            name: e + "_titulo[]"
        });
        if (r) {
            s.attr("required-field", "required");
            s.attr("label", i || e);
            a.attr("required-field", "required");
            a.attr("label", i || e)
        }
        if (!t.arquivo && t) {
            u.attr("src", t);
            s.val(t)
        }
        o.append(u).append("<br/><br/>");
        if (t.arquivo && n) o.append('<span class="uploader-path">' + t.arquivo + "</span>");
        else if (t) o.append('<span class="uploader-path">' + t + "</span>");
        else o.append('<span class="uploader-path">Selecione uma Imagem</span>');
        o.append("<br/><br/>").append(s);
        if (n) {
            o.append(a).append("<br/>");
        }
        if (n || t) {
            o.append("<a class='uploader-remove uploader-btn' href='#' onclick='removerImagem(this);return false;'>Remover</a>");
            if (n) o.append("<br class='clear' />")
        }
        if (!n) {
            o.append("<a class='uploader-buscar uploader-btn' href='#' onclick='selecionaImagem(this);return false;'>Buscar</a><br class='clear' />")
        }
        var f = $("<div/>", {
            "class": "uploader-boundingbox"
        });
        f.append(o);
        return f
    }

    function selecionaImagem(e) {
        var t = $(e).parents(".uploader-item");
        window.KCFinder = {
            callBack: function (n) {
                window.KCFinder = null;
                $("img", t).attr("src", n);
                $(".uploader-arquivo", t).val(decodeURIComponent(n));
                $(".uploader-path", t).text(decodeURIComponent(n));
                if (!$(".uploader-remove", t).length) $(e).before("<a class='uploader-remove uploader-btn' href='#' onclick='removerImagem(this);return false;'>Remover</a>")
            }
        };
        window.open($live_path + "media/ckeditor/kcfinder/browse.php?type=images&dir=image", "kcfinder_image", "status=0, toolbar=0, location=0, menubar=0, " + "directories=0, resizable=1, scrollbars=0, width=800, height=600")
    }

    function adicionarImagem(e) {
        var t = {
            arquivo: "",
            titulo: ""
        };
        window.KCFinder = {
            callBackMultiple: function (n) {
                window.KCFinder = null;
                for (var r = 0; r < n.length; r++) {
                    var i = n[r];
                    t.arquivo = i;
                    var s = $('.uploader-area[data-uuid="' + e + '"]');
                    var o = s.attr("name");
                    s.append(createImageUploader(o, t, true))
                }
            }
        };
        window.open($live_path + "media/ckeditor/kcfinder/browse.php?type=images&dir=image", "kcfinder_image", "status=0, toolbar=0, location=0, menubar=0, " + "directories=0, resizable=1, scrollbars=0, width=800, height=600")
    }

    function removerImagem(e) {
        $this = $(e);
        if (confirm("Deseja realmente remover essa imagem?", "Remover Imagem")) {
            if ($this.parents(".uploader-area").length) $this.parents(".uploader-boundingbox")[0].remove();
            else {
                $itsParent = $this.parents(".uploader-item")[0];
                $("img", $itsParent).attr("src", "");
                $(".uploader-arquivo", $itsParent).val("");
                $(".uploader-path", $itsParent).text("Selecione uma imagem");
                $this.remove()
            }
        }
    }

    function createFileUploader(e, t, n, r) {
        var i = $("<input/>", {
            type: "hidden",
            name: e,
            value: t.arquivo,
            "class": "uploader-arquivo"
        });
        var s = $("<div/>", {
            "class": "uploader-item",
            name: e
        });
        var o = $("<input>", {
            maxlength: "100",
            value: t.titulo
        });
        if (n) {
            i.attr("required-field", "required");
            i.attr("label", r || e);
            o.attr("required-field", "required");
            o.attr("label", r || e)
        }
        if (!t.arquivo && t) {
            i.val(t)
        }
        s.append("<br/>");
        if (t) s.append('<span class="uploader-filepath">' + t + "</span>");
        else s.append('<span class="uploader-filepath">Selecione um Arquivo</span>');
        s.append("<br/><br/>").append(i);
        if (t) {
            s.append("<a class='uploader-remove uploader-btn' href='#' onclick='removerArquivo(this);return false;'>Remover</a>")
        }
        s.append("<a class='uploader-buscar uploader-btn' href='#' onclick='selecionaArquivo(this);return false;'>Buscar</a><br class='clear' />");
        var u = $("<div/>", {
            "class": "uploader-boundingbox"
        });
        u.append(s);
        return u
    }

    function removerArquivo(e) {
        $this = $(e);
        if (confirm("Deseja realmente remover esse arquivo?", "Remover Imagem")) {
            if ($this.parents(".uploader-area").length) $this.parents(".uploader-boundingbox")[0].remove();
            else {
                $itsParent = $this.parents(".uploader-item")[0];
                $(".uploader-arquivo", $itsParent).val();
                $(".uploader-filepath", $itsParent).text("Selecione um arquivo");
                $this.remove()
            }
        }
    }

    function selecionaArquivo(e) {
        var t = $(e).parents(".uploader-item");
        window.KCFinder = {
            callBack: function (n) {
                window.KCFinder = null;
                $(".uploader-filename", t).text(/[^\/]*$/i.exec(n).toString());
                $(".uploader-arquivo", t).val(n);
                $(".uploader-filepath", t).text(n);
                if (!$(".uploader-remove", t).length) $(e).before("<a class='uploader-remove uploader-btn' href='#' onclick='removerArquivo(this);return false;'>Remover</a>")
            }
        };
        window.open($live_path + "media/ckeditor/kcfinder/browse.php?dir=arquivos", "kcfinder_arquivo", "status=0, toolbar=0, location=0, menubar=0, " + "directories=0, resizable=1, scrollbars=0, width=800, height=600")
    }

    function validaRequired(e) {
        var t = true;
        var n = new Array;
        var r = new Array;
        $("#message-red").hide();
        $("input[required-field],textarea[required-field],select[required-field]").each(function () {
            $this = $(this);
            if (!$this.val()) {
                t = false;
                n.push($this.attr("label") || $this.attr("name"))
            }
        });
        $("input[email]").each(function () {
            $this = $(this);
            if ($this.val()) {
                if (!email_regex.test($this.val())) {
                    t = false;
                    r.push(($this.attr("label") || $this.attr("name")) + " contém um email inválido.")
                }
            }
        });
        if (!t) {
            var i = "";
            if (n.length) i += "Preencha os campos: " + n.join(", ") + "<br/>";
            if (r.length) i += r.join(" | ");
            $("#box-erros").html(i);
            $("#message-red").show()
        }
        return t
    }
    $(document).ready(function () {
        var e = false,
            t = false;
        if (!e && $().datePicker) {
            var n = $("input[type='date-input']");
            n.datePicker({
                clickInput: true,
                startDate: "01/01/2000",
                createButton: false
            });
            if (n.val() == "") {
                n.val((new Date).asString()).trigger("change")
            }
            n.mask("99/99/9999", "_")
        }
        var r = $("input[type='telefone']");
        r.focusout(function () {
            var e, t;
            t = $(this);
            t.unmask();
            e = t.val().replace(/\D/g, "");
            if (e.length > 12) {
                t.mask("+55 (99) 99999-999?9")
            } else {
                t.mask("+55 (99) 9999-9999?9")
            }
        }).trigger("focusout");
        if ($().ckeditor) $("textarea[editor]").ckeditor({
            filebrowserBrowseUrl: $live_path + "media/ckeditor/kcfinder/browse.php?type=files",
            filebrowserImageBrowseUrl: $live_path + "media/ckeditor/kcfinder/browse.php?type=images",
            filebrowserFlashBrowseUrl: $live_path + "media/ckeditor/kcfinder/browse.php?type=flash",
            filebrowserUploadUrl: $live_path + "media/ckeditor/kcfinder/upload.php?type=files",
            filebrowserImageUploadUrl: $live_path + "media/ckeditor/kcfinder/upload.php?type=images",
            filebrowserFlashUploadUrl: $live_path + "media/ckeditor/kcfinder/upload.php?type=flash"
        });
        $("imageupload[multiple]").each(function () {
            var e = $(this),
                t = e.attr("name"),
                n = e.attr("class"),
                r = e.attr("id"),
                i = e.attr("value") ? JSON.parse(e.attr("value")) : {};
            $uuid = UUID();
            var s = $("<div>", {
                "class": "uploader-area " + n,
                id: r,
                "data-uuid": $uuid,
                name: t
            });
            if (i) {
                for (var o = 0; o < i.length; o++) {
                    var u = createImageUploader(t, i[o], true);
                    s.append(u)
                }
            }
            e.after(s);
            e.before("<a class='uploader-add uploader-btn' href='#' onclick='adicionarImagem(\"" + $uuid + "\");return false;'>Adicionar</a><br class='clear' />");
            e.remove()
        });
        $("imageupload").each(function () {
            var e = $(this),
                t = e.attr("name"),
                n = e.attr("class"),
                r = e.attr("id"),
                i = e.attr("value");
            $uuid = UUID(), required = e.attr("required") !== undefined, label = e.attr("label");
            if (typeof i === "undefined") i = null;
            var s = createImageUploader(t, i, false, required, label);
            s.attr("data-uuid", $uuid);
            e.after(s);
            e.remove()
        });
        $("mapselector").each(function () {
            var e = $(this),
                t = e.attr("name"),
                n = e.attr("value"),
                r = UUID();
            w = e.attr("width"), h = e.attr("height");
            if (typeof n === "undefined") n = null;
            var i = createMapSelector(t, n, e, r, w, h);
            e.remove()
        });
        processMaps();
        $("fileupload").each(function () {
            var e = $(this),
                t = e.attr("name"),
                n = e.attr("class"),
                r = e.attr("id"),
                i = e.attr("value");
            $uuid = UUID(), required = e.attr("required") !== undefined, label = e.attr("label");
            if (typeof i === "undefined") i = null;
            var s = createFileUploader(t, i, required, label);
            s.attr("data-uuid", $uuid);
            e.after(s);
            e.remove()
        });
        var i = $("input[required],textarea[required],select[required]");
        if (!t) {
            i.removeAttr("required");
            i.attr("required-field", "required")
        }
        $("form").submit(function (e) {
            if (!t) {
                return validaRequired(e)
            }
        })
    })
}
