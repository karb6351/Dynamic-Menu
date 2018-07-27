<template>
    <Tree :data="menuTree" draggable="draggable" cross-tree="cross-tree" :ondragend="handleAfterDrag">
        <div slot-scope="{data, store}">
            <template v-if="!data.isDragPlaceHolder">
                <b v-if="data.children &amp;&amp; data.children.length" @click="store.toggleOpen(data)">
                    {{data.open ? '-' : '+'}}&nbsp;
                </b>
                <span>{{data.name_en}}</span>
            </template>
        </div>
    </Tree>
</template>

<script>
    import {DraggableTree} from 'vue-draggable-nested-tree'
    export default {
        name: "MenuTree",
        components:{
            Tree: DraggableTree
        },
        props:{
            menu: Array
        },
        data(){
            return {
                menuTree: this.menu,

            }
        },
        methods:{
            handleAfterDrag(node, nodeVm, store, event){

                const updateTree = store.pure(node, true)
                console.log(updateTree)
                // this.$emit('drag', updateTree)
            }
        },
        computed:{
            getMenu(){
                return this.menuTree
            }
        }
    }
</script>

<style scoped>

</style>