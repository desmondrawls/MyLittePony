class Mlp.Views.Chat extends Backbone.View
  template: JST['exploring/chat']

  initialize: ->
    @collection.on('reset', @render, this)
    @collection.on('change', @render, this)


  events:
    'submit #new_message': 'createMessage'


  render: ->
    console.log("rendering chat..")
    $(@el).html(@template())
    @collection.each(@appendMessage)
    this


  appendMessage: (message) =>
    console.log("appending message...")
    pony_view = new Mlp.Views.Message(model: message)
    @$('#messages').append(pony_view.render().el)


  createMessage: (event) ->
    event.preventDefault()

    attributes = 
      content: $('#new-message-content').val()

    options =
      wait: true
      error: @handleError    

    @collection.create attributes, options
    $('#new-message-content').val("")


  handleError: (pony, response) -> 
    if response.status == 422
      errors = $.parseJSON(response.responseText).errors
      for attribute, messages of errors
        alert "#{attribute} #{message}" for message in messages

