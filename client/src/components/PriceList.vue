<template>
  <el-main>
    <el-table :data="tableData">
      <el-table-column prop="id" label="Id" width="140"></el-table-column>
      <el-table-column prop="company" label="Empresa" width="140"></el-table-column>
      <el-table-column prop="fixedValue" label="Valor Fixo" width="120"></el-table-column>
      <el-table-column prop="kilogramsKilometersValue" label="Valor Kg/Km"></el-table-column>
    </el-table>

  </el-main>
</template>

<script>
export default {
  data() {
    return {
      tableData: [
        {
          id: "",
          company: "",
          fixedValue: "",
          kilogramsKilometersValue: ""
        }
      ],
    };
  },
  methods: {
    findAll() {
      this.$request
        .get("pricelist")
        .then(response => {
          console.log(response);
          this.tableData = response.data.data;
        })
        .catch(error => {
          console.log(error);
          this.$notify.error({
            title: "Erro!",
            message: "Não foi possível carregar a tabela de preços"
          });
        })
        .finally(() => {
          this.loading = false;
        });
    },
  },
  mounted: function() {
    this.findAll();
  }
};
</script>

<style>
</style>