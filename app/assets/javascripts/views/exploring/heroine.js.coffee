class Mlp.Views.Heroine extends Backbone.View
  template: JST['exploring/heroine']
  id: "heroine"

  initialize: ->
    Mlp.vent.on('action:escape', @triggerChoice, this)
    console.log("initialize heroine")
    console.log(@model)

  render: ->
    $(@el).html(@template(pony: this.model))
    this

  triggerChoice: ->
    Mlp.vent.trigger('pony:click', this.model)