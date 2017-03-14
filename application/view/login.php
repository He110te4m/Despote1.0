<div style="position: fixed; top: 60%; left: 50%; width:50%; height: 50%; -webkit-transform: translateX(-50%) translateY(-50%); -moz-transform: translateX(-50%) translateY(-50%); -ms-transform: translateX(-50%) translateY(-50%); transform: translateX(-50%) translateY(-50%);">
    <div class="col-sm-8 col-sm-offset-2">
        <form class="form-horizontal" action="/user" method="post">
            <div class="form-group">
                <label class="control-label col-md-2" for="username">用户名</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="username" placeholder="用户名">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="password">密码</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" id="password" placeholder="密码">
                </div>
            </div>
            <div class="col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-lg">登录</button>
                <button type="submit" class="btn btn-primary btn-lg">忘记密码</button>
            </div>
        </form>
    </div>
</div>
