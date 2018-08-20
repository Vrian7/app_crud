import { mount } from 'vue-test-utils';
import Record from '../components/record/RecordIndex.vue';
import expect from 'expect';

describe ('Record',()=>{
    it('verify rows',()=>{
        let wrapper = mount(Record);
        //expect(wrapper.vm.columns).toBe(200);

    });
});