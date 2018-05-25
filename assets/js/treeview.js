;
'use strict';

(function (window) {
	const TreeViewService = function () {
		return {
			checked: [],
			tree: [],

			defaultOpts: {
				bootstrap2: false,
				showTags: true,
				levels: 10,
				highlightSelected: false,
				multiSelect: true,
				showCheckbox: true,
				onNodeChecked: function (event, data) {
					if (this.checked.indexOf(data.id) === -1)
						this.checked.push(data.id);
				},

				onNodeUnchecked: function (event, data) {
					if (this.checked.indexOf(data.id) !== -1)
						this.checked.pop(checked.indexOf(data.id));
				},
				data: this.tree
			},

			getOpts(preOpts) {
				return Object.assign({}, this.defaultOpts, preOpts);
			},

			setTree(data, parent) {
				this.tree = this.getTree(data, parent);
				this.clearEmptyNodeChilds();
				this.defaultOpts.data = this.tree;
			},

			getTree(array, parent, first = true) {
				const parents = array.map(x => x.parent).filter((v, i, s) => s.indexOf(v) === i);
				let out = array
				.filter(el => {
					if (first) {
						const cond = parents.includes(el.id);
						if (cond) return true;
					}
					return el.parent === parent;
				})
				.map((root) => {
					const { id, name } = root;
					// console.log(`el ${id} is leaf for ${parent}`);
					return {
						id,
						text: name,
						state: {
							checked: false,
							disabled: false,
							expanded: true,
							selected: false
						},
						nodes: this.getTree(array, id, false),
					};
				});
				return out;
			},

			clearEmptyNodeChilds(array) {
				array = array || this.tree;
				array.forEach(value => {
					if (value.nodes.length !== 0) {
						this.clearEmptyNodeChilds(value.nodes)
					} else {
						delete value.nodes;
					}
				});
			}
		};
	};
	window.TreeViewService = new TreeViewService();
})(window);