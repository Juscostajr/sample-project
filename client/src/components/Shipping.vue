<template>
  <el-main>
    <el-table :data="shippingData">
      <el-table-column prop="id" label="Id" width="140"></el-table-column>
      <el-table-column prop="product" label="Produto" width="120"></el-table-column>
      <el-table-column prop="distance" label="Distância"></el-table-column>
      <el-table-column prop="weight" label="Peso"></el-table-column>
      <el-table-column fixed="right" label="Opções" width="120">
        <template scope="scope">
          <el-button type="text" size="small" @click="freightSearch(scope.$index)">Calcular Remessa</el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-dialog title="Frete" :visible.sync="centerDialogVisible" width="80%" center>
      <el-table :data="freigthData">
        <el-table-column prop="id" label="Id" width="140"></el-table-column>
        <el-table-column prop="company" label="Empresa" width="140"></el-table-column>
        <el-table-column prop="fixedValue" label="Valor Fixo" width="120"></el-table-column>
        <el-table-column prop="kilogramsKilometersValue" label="Peso"></el-table-column>
        <el-table-column prop="freight" label="Frete"></el-table-column>
      </el-table>
      <span slot="footer" class="dialog-footer">
        <el-button type="primary" @click="centerDialogVisible = false">Fechar</el-button>
      </span>
    </el-dialog>
  </el-main>
</template>

<script>
export default {
  data() {
    return {
      shippingData: [
        {
          id: "",
          product: "",
          distance: "",
          weight: ""
        }
      ],
      freigthData: [
        {
          id: "",
          company: "",
          fixedValue: "",
          kilogramsKilometersValue: "",
          freight: ""
        }
      ],
      centerDialogVisible: false
    };
  },
  methods: {
    freightSearch(id) {
      this.$request
        .get(`pricelist/freight/${id + 1}`)
        .then(response => {
          this.centerDialogVisible = true;
          this.freigthData = response.data.data;
        })
        .catch(error => {
          console.error(error);
          this.$notify.error({
            title: "Erro!",
            message: "Não foi possível carregar a tabela de frete"
          });
        })
        .finally(() => {
          this.loading = false;
        });
    },
        findAll() {
      this.$request
        .get("shipping")
        .then(response => {
          this.shippingData = response.data.data;
        })
        .catch(error => {
          console.error(error);
          this.$notify.error({
            title: "Erro!",
            message: "Não foi possível carregar as remessas"
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
}
</script>

<style>
</style>