class Mlp.Views.PoniesIndex extends Backbone.View

  poniesTemplate: JST['ponies/index']

  events:
    'submit #new_pony': 'createPony'
    'click #pony_up': 'ponyUp'

  initialize: ->
    console.log(Mlp.Collections.Settings)
    @collection.on('reset', @render, this)
    @collection.on('add', @appendPony, this)
    @collection.on('change', @render, this)

  ponyUp: (event) ->
    event.preventDefault()
    @collection.ponyDown()
    @collection.ponyUp()

  render: ->
    $(@el).html(@poniesTemplate())
    @collection.each(@appendPony)
    this

  appendPony: (pony) =>
    view = new Mlp.Views.Pony(model: pony)
    @$('#ponies').append(view.render().el)


  createPony: (event) ->
    event.preventDefault()

    attributes = 
      name: $('#new_pony_name').val()
      img_url: $('#new_pony_img_url').val()

    options =
      wait: true
      error: @handleError    

    @collection.create attributes, options

  handleError: (pony, response) -> 
    if response.status == 422
      errors = $.parseJSON(response.responseText).errors
      for attribute, messages of errors
        alert "#{attribute} #{message}" for message in messages


