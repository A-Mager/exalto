<template>
    <div class="container" id="tableDiv">
        <input :value="checkedItems" form="qrSelect" name="selected" id="selected" hidden/>
        <table id="table" class="table display stripe" style="width:60%;">
            <thead style="background-color:#b51f38">
            <tr>
                <th style="color:#ffffff"></th>
                <th style="color:#ffffff">Naam </th>
                <th style="color:#ffffff">Nummer</th>
                <th style="color:#ffffff">Type</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="row in rows">
                <td id="cell-centered"><input type="checkbox"  :value="row.model_number" v-model="checkedItems" ></td>
                <td><div class="level-left"><button class="button is-text is-small">{{ row.model_name }}</button></div></td>
                <td><button class="button is-text is-small">{{ row.model_number }}</button></td>
                <td><button class="button is-text is-small">{{ row.model_type }}</button></td>
            </tr>

            </tbody>
            <tfoot style="background-color:#b51f38; color: #ffffff">
            <tr>
                <th style="color:#ffffff"></th>
                <th style="color:#ffffff">Naam </th>
                <th style="color:#ffffff">Nummer</th>
                <th style="color:#ffffff">Type</th>
            </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    export default{
        props: ['rows'],
        data:function(){
            return {
                checkedItems: [],
            }
        }
    }

</script>