<template>
    <Tree :data="menuTree" draggable="draggable" cross-tree="cross-tree" @change="treeChange" :is-Node-Droppable="maxDroppableLevel">
        <div slot-scope="{data, store}">
            <template v-if="!data.isDragPlaceHolder">
                <b v-if="data.children && data.children.length" @click="store.toggleOpen(data)">
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
            Tree: DraggableTree,
        },
        props:{
            menu: Array,
            maxDepth:{
                type: Number,
                default: 2
            }
        },
        data(){
            return {
                menuTree: this.menu,
                updateTree: '',
            }
        },
        methods:{
            //trigger when user change the item position
            treeChange(node, nodeVm, store){
                this.updateTree = store.pure(store.rootData, true).children
                this.$emit('drag', this.updateTree)
            },
            //max depth
            maxDroppableLevel(node, nodeVm, store){
                return node.level <= this.maxDepth
            }
        },
    }
</script>

<style lang="scss">
    .he-tree{
        border: 1px solid #ccc;
        padding: 20px;
        float: left;
        min-width: 300px;
        margin-right: 30px;
    }
    .tree-node{
    }
    .tree-node-inner{
        padding: 5px;
        border: 1px solid #ccc;
        cursor: pointer;
    }
    .draggable-placeholder{
    }
    .draggable-placeholder-inner{
        border: 1px dashed #0088F8;
        box-sizing: border-box;
        background: rgba(0, 136, 249, 0.09);
        color: #0088f9;
        text-align: center;
        padding: 0;
        display: flex;
        align-items: center;
    }
</style>