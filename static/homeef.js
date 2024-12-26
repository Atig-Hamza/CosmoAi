var hidden = function(w, h) {
    var c = document.createElement('canvas');
    c.width = w = window.innerWidth;
    c.height = h = window.innerHeight;
    return c.getContext("2d");
  };
  var sqw = 8,
    sqs = sqw + 16,
    n = Math.ceil(window.innerWidth / sqs),
    m = Math.ceil(window.innerHeight / sqs),
    chg = 3;
  
  var c = document.getElementById("canv"),
    w = c.width = n * sqs,
    h = c.height = m * sqs;
  var $ = c.getContext("2d");
  
  var hc = {
    c1: hidden(w, h),
    c2: hidden(w, h),
    c3: hidden(w, h),
    exch: function() {
      var t = this.c1;
      this.c1 = this.c2;
      this.c2 = t;
    }
  }
  
  var rw = function(i, n) {
    return i < 0 ? i + n : i % n;
  }
  
  var draw = function(obj, $) {
    $.lineWidth = 2;
    $.clearRect(0, 0, w, h);
    var fin = obj.row.slice(0);
    for (var j = m; j--;) {
      var row = obj.row;
      for (var i = n - 1; i--;) {
        var g = $.createLinearGradient(i * sqs, (m - j - 1) * sqs, 1, i * sqs, (m - j - 1) * sqs, 2 + 2);
        g.addColorStop(0, 'hsla(' + i * j + ', 100%, 60%, .5)');
        g.addColorStop(.5, 'hsla(' + i * m + ', 100%, 60%, .4)');
        g.addColorStop(1, 'hsla(255, 255%, 255%, 1)');
        if (row[i] == row[i + 1]) {
          $.strokeStyle = g;
          $.beginPath();
          $.moveTo(i * sqs, (m - j - 1) * sqs);
          $.lineTo((i + 1) * sqs, (m - j - 1) * sqs);
          $.stroke();
        }
        if (row[i] == fin[i]) {
          $.strokeStyle = g;
          $.beginPath();
          $.moveTo(i * sqs, (m - j - 2) * sqs);
          $.lineTo(i * sqs, (m - j - 1) * sqs);
          $.stroke();
        }
      }
      var fin = obj.row.slice(0);
      obj.mv();
    }
  }
  var
    nc = document.createElement("canvas"),
    $$ = nc.getContext("2d");
  
  nc.width = w;
  nc.height = h;
  
  var dnxt = function(obj) {
    $$.drawImage(c, 0, 0, w, h);
    $.drawImage(nc,
      0, sqs, w, h - sqs,
      0, 0, w, h - sqs);
  
    var row = obj.row;
    for (var i = n; i--;) {
      $.fillStyle = getColor(row[i]);
      $.fillRect(i * sqs, (m - 1) * sqs, sqw, sqw);
    }
    obj.mv();
  };
  
  var chg2 = chg * chg,
    chg3 = chg2 * chg,
    chg4 = chg3 * chg;
  var _obj = function(chg) {
    var arr = [];
    for (var i0 = 0; i0 < chg; ++i0) {
      for (var i1 = 0; i1 < chg; ++i1) {
        for (var i2 = 0; i2 < chg; ++i2) {
          for (var i3 = 0; i3 < chg; ++i3) {
            for (var i4 = 0; i4 < chg; ++i4) {
              var _i = i4 * chg4 + i3 * chg3 + i2 * chg2 + i1 * chg + i0;
              var _i2 = i4 * chg4 + i3 * chg3 + i1 * chg2 + i2 * chg + i0;
              var _i3 = i3 * chg4 + i4 * chg3 + i2 * chg2 + i1 * chg + i0;
              var _i4 = i3 * chg4 + i4 * chg3 + i1 * chg2 + i2 * chg + i0;
              var val = (_i === 0) ? 0 : Math.floor(Math.random() * chg);
              arr[_i4] = arr[_i3] = val;
              arr[_i2] = arr[_i] = val;
            }
          }
        }
      }
    };
    var obj = {
      arr: arr,
      row: [],
      row2: [],
      mv: function() {
        for (var i = n; i--;) {
          var v0 = this.row[i],
            v1 = this.row[rw(i - 1, n)],
            v2 = this.row[rw(i + 1, n)],
            v3 = this.row[rw(i - 2, n)],
            v4 = this.row[rw(i + 2, n)];
          this.row2[i] = this.arr[v4 * chg4 + v3 * chg3 + v2 * chg2 + v1 * chg + v0];
        };
        var curr = this.row;
        this.row = this.row2;
        this.row2 = curr;
      }
    };
    for (var i = n; i--;) {
      obj.row2[i] = obj.row[i] = Math.floor(Math.random() * chg);
    };
    return obj;
  };
  
  var obj = _obj(chg);
  var beg = obj.row.slice(0);
  var barr = obj.arr.slice();
  draw(obj, hc.c1);
  $.drawImage(hc.c1.canvas, 0, 0);
  
  var cnt = 0;
  var fade = 20;
  
  var next = function() {
    if (cnt % fade == 0) {
      var i0 = Math.floor(Math.random() * chg),
        i1 = Math.floor(Math.random() * chg),
        i2 = Math.floor(Math.random() * chg),
        i3 = Math.floor(Math.random() * chg),
        i4 = Math.floor(Math.random() * chg);
      if (i0 !== 0 || i1 !== 0 || i2 !== 0 || i3 !== 0 || i4 !== 0) {
        var _i1 = i4 * chg4 + i3 * chg3 + i2 * chg2 + i1 * chg + i0;
        var _i2 = i4 * chg4 + i3 * chg3 + i1 * chg2 + i2 * chg + i0;
        var _i3 = i3 * chg4 + i4 * chg3 + i2 * chg2 + i1 * chg + i0;
        var _i4 = i3 * chg4 + i4 * chg3 + i1 * chg2 + i2 * chg + i0;
        var delt = (Math.random() < 0.5) ? -1 : 1;
        barr[_i4] = barr[_i3] = barr[_i2] = barr[_i1] = rw(barr[_i1] + delt, chg);
      }
  
      obj.row = beg.slice(0);
      obj.arr = barr.slice(0);
      hc.exch();
      draw(obj, hc.c1);
    }
    $.clearRect(0, 0, w, h);
    hc.c3.clearRect(0, 0, w, h);
    hc.c3.globalAlpha = 1.0 - (cnt % fade) / fade;
    hc.c3.drawImage(hc.c2.canvas, 0, 0);
    hc.c3.globalAlpha = (cnt % fade) / fade;
    hc.c3.drawImage(hc.c1.canvas, 0, 0);
    $.drawImage(hc.c3.canvas, 0, 0);
    cnt += 1;
  };
  
  function run() {
    window.requestAnimationFrame(run);
    next();
  }
  run();