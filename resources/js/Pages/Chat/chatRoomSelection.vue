<template>
	<div class="grid grid-cols-2">
		<div class="font-bold text-xl">
			{{ selected.name }} Chat
		</div>
		<div>
			<select
				v-model="selected"
				@change="$emit('roomChanged',selected)"
				class="float-right rounded-full">
				<option v-for="(room,index) in chatRooms" 
					:key="index" 
					:value="room">
					{{room.name}}
				</option>
				
			</select>			
		</div>
	</div>
</template>

<script>
	export default{
		props:['currentRoom','chatRooms'],
		data:function(){
			return{
				selected:''
			}
		},
		created(){
			this.selected = this.currentRoom;
		}
	}
</script>