<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                <div class="card-body">
                    <h4>SIGN IN</h4>
                    <br/>
                    <input id="email" placeholder="User Email" class="form-control" type="email"/>
                    <br/>
                    <input id="pass" placeholder="User Password" class="form-control" type="password"/>
                    <br/>
                    <button onclick="SubmitLogin()" class="btn w-100 btn-primary">Next</button>
                    <hr/>
                    <div class="float-end mt-3">
                        <span>
                            <a class="text-center ms-3 h6" href="{{url('/manager-reg-page')}}">Manager signup</a>
                            <span class="ms-1">|</span>
                            <a class="text-center ms-3 h6" href="{{url('/emp-reg-page')}}">Employee signup</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

async function SubmitLogin() {

        let email=document.getElementById('email').value;
        let pass=document.getElementById('pass').value;
        if(email.length===0){
            errorToast('Email Required !')
        }
        else if(pass.length===0){
            errorToast('Password Required !')
        }
        else{

            showLoader();
            let res = await axios.post("/login", { email: email, password: pass });
             hideLoader();  

             if(res.data['status']==='success' && res.data['role']==='manager'){
                successToast(res.data['message']);
                setTimeout(function()  {
                    window.location.href = "{{url('/managerDashboard') }}";
            }, 1000); 
             }
             else if (res.data['status']==='success' && res.data['role']==='employee'){
                successToast(res.data['message']);

                setTimeout(function()  {
                    window.location.href = "{{url('/employeeDashboard') }}";
            }, 1000);  
             }
             else{
                errorToast('something wrong')
             }
        }
}

</script>
