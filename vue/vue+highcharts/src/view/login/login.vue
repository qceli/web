<template>
    <div style="width: 100%;height: 100vh;">
        <div class="loginPanel">
            <Form ref="formValidate" :model="form" :rules="rule" :label-width="0">
                <FormItem label="" prop="name">
                    <Input v-model="form.name" placeholder="请输入您的账户"></Input>
                </FormItem>
                <FormItem label="" prop="password">
                    <Input v-model="form.password" type="password" placeholder="请输入你的密码"></Input>
                </FormItem>
                <FormItem label="" prop="protocol">
                    <CheckboxGroup v-model="form.protocol">
                        <Checkbox label="我接受《xxx公司用户协议》  《隐私政策》"></Checkbox>
                    </CheckboxGroup>
                </FormItem>
                <FormItem style="margin-bottom: 0">
                    <Button type="primary" @click="handleSubmit('formValidate')">登录</Button>
                    <Button type="ghost" @click="handleReset('formValidate')" style="margin-left: 8px">重置</Button>
                </FormItem>
            </Form>
        </div>
    </div>
</template>
<script>
  export default {
    data () {
      return {
        form: {
          name: '',
          password: '',
          protocol: [],
        },
        rule: {
          name: [
            { required: true, message: '请填写账户信息', trigger: 'blur' }
          ],
          password: [
            { required: true, message: '登录密码不能为空', trigger: 'blur' }
          ],
          protocol: [
            { required: true, type: 'array', min: 1, message: '请先阅读用户协议内容', trigger: 'change' }
          ]
        }
      }
    },
    methods: {
      handleSubmit (name) {
        this.$refs[name].validate((valid) => {
          if (valid) {
            // this.$store.state.token = '123';
            this.$store.commit('login', '123')
            this.$Message.success('登陆成功!');
            this.$router.push('/home');
          } else {
            this.$Message.error('验证失败!');
          }
        })
      },
      handleReset (name) {
        this.$refs[name].resetFields();
      }
    }
  }
</script>
<style scoped>
    @media screen and (max-height:400px) {
        .loginPanel{
            position: absolute;
            left:calc(50% - 225px);
            top:50px;
            width:450px;
        }
    }
    @media screen and (min-height:400px){
        .loginPanel{
            position: absolute;
            left:calc(50% - 175px);
            top:calc(40% - 120px);
            width:350px;
        }
    }
    .loginPanel{
        background-color: #f8f8f9;
        padding:10px;
        border-radius: 4px;
    }
</style>