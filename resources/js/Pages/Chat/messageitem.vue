<template>
	<div> <span class="rounded-full userName">{{message.user.name}} :</span> {{message.message}} <br> &nbsp;&nbsp;&nbsp; </div>
</template>

<script>
	export default{
		props:['message']
	}
</script>
<style scoped>
.userName{
  border: 1px solid #f5e0e0;
  padding: 5px;

}
</style>