class Mlp.Views.Riding extends Backbone.View
  template: JST['riding/riding']

  initialize: ->
    console.log('i miss canterlot')
    @model.on('reset', @render, this)
    console.log(@model)

  render: ->
    $(@el).html(@template())
    adventurePonyView = new Mlp.Views.adventurePony(model: @model)
    @$('#adventurePony').append(adventurePonyView.render().el)
    this