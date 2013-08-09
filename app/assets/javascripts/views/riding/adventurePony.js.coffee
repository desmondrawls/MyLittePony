class Mlp.Views.adventurePony extends Backbone.View
  template: JST['riding/adventurePony']

  initialize: ->
    console.log("gimme the loot")
    console.log(@model)

  render: ->
    $(@el).html(@template(pony: this.model))
    this