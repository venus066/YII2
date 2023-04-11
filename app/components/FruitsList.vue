<template>
  <a-table
      :dataSource='fruits'
      :columns='columns'
      rowKey='id'
      bordered
  >
    <template #action='{ record }'>
      <div>
        <a-button
            type='primary'
            @click='makeFavorite(record.id)'
            style='margin-right: 5px'
            ghost
        >
          Make Favorite
        </a-button>
      </div>
    </template>
  </a-table>
</template>
<script>
import api from '../api';
import {
  PlusOutlined,
  EyeOutlined,
  EditOutlined,
  DeleteOutlined,
  WarningOutlined
} from '@ant-design/icons-vue';

export default {
  components: {
    PlusOutlined,
    EditOutlined,
    EyeOutlined,
    DeleteOutlined,
    WarningOutlined
  },
  data() {
    return {
      fruits: [],
      columns: [
        {
          title: 'Name',
          dataIndex: 'name',
          key: 'name',
          ellipsis: true
        },
        {
          title: 'Genus',
          dataIndex: 'genus',
          key: 'genus',
        },
        {
          title: 'Family',
          dataIndex: 'family',
          key: 'family',
          customFilterDropdown: true,
        },
        {
          title: 'Order',
          dataIndex: 'order',
          key: 'order',
        },
        {
          title: 'Action',
          key: 'action',
          slots: {customRender: 'action'},
        },
      ]
    };
  },
  methods: {
    async deleteFruit(fruitId) {
      await api.helpDelete(`fruits/${fruitId}`);
      this.fruits = this.fruits.filter(({id}) => id !== fruitId);
    },
    showFruit(fruitId) {
      this.$router.push({name: 'fruit-item', params: {fruitId}});
    },
    showAddFruitForm() {
      this.$router.push('/fruit/add');
    },
    showEditFruitForm(fruitId) {
      this.$router.push({name: 'fruit-form', params: {fruitId}});
    },
    async makeFavorite(fruitId) {
      await api.helpPatch('fruit', fruitId);
    }
  },
  async mounted() {
    this.fruits = await api.helpGet('fruits');
  }
};
</script>
